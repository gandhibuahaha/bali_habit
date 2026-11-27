<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Admin Refleksi Management (D-35, D-36): the reflection questions of each story,
 * each with its right answer (reflections.answer: true = Iya, false = Tidak).
 * - Any story can get questions, drafts too (marked "(Draft)").
 * - Deleting a question also deletes the kids' answers to it; kid tries left
 *   without any answer are deleted as well.
 * The kids' Refleksi page reads these questions (ChildProgressController).
 */
class ReflectionController extends Controller
{
    private const MAX_QUESTION_LENGTH = 500;

    /** List: stories that have questions, with the count. Search and pages run in the browser. */
    public function index(): View
    {
        $counts = DB::table('reflections')
            ->groupBy('story_id')
            ->selectRaw('story_id, COUNT(*) AS total')
            ->pluck('total', 'story_id');

        $rows = Story::query()
            ->whereIn('story_id', $counts->keys())
            ->orderBy('story_order')
            ->orderBy('title')
            ->get(['story_id', 'title', 'status'])
            ->map(fn (Story $story) => [
                'id' => $story->story_id,
                'cerita' => $story->title,
                'draft' => $story->status !== 'active',
                'jumlahPertanyaan' => (int) $counts[$story->story_id],
            ])
            ->values();

        return view('admin.refleksi_management', ['rows' => $rows]);
    }

    /** Tambah: only stories that have no questions yet (each story has one question set). */
    public function create(): View
    {
        $stories = Story::query()
            ->whereNotIn('story_id', DB::table('reflections')->select('story_id'))
            ->orderBy('story_order')
            ->orderBy('title')
            ->get(['story_id', 'title', 'status']);

        return view('admin.tambah_refleksi', [
            'stories' => $stories,
            'questions' => $this->formQuestions(collect()),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            ['story_id' => ['required', 'string', 'exists:stories,story_id']],
            ['story_id.required' => 'Pilih cerita terlebih dahulu.', 'story_id.exists' => 'Cerita tidak ditemukan.']
        );
        $storyId = $request->input('story_id');

        if (DB::table('reflections')->where('story_id', $storyId)->exists()) {
            throw ValidationException::withMessages([
                'story_id' => 'Cerita ini sudah punya pertanyaan refleksi. Ubah lewat tombol Edit.',
            ]);
        }

        $questions = $this->validatedQuestions($request);

        DB::transaction(function () use ($storyId, $questions) {
            $now = now();
            foreach ($questions as $i => $question) {
                DB::table('reflections')->insert([
                    'story_id' => $storyId,
                    'question' => $question['text'],
                    'answer' => $question['answer'],
                    'order_number' => $i + 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });

        return redirect()->route('admin.reflections.index')->with('success', 'Pertanyaan refleksi berhasil disimpan.');
    }

    /** Lihat: read only. */
    public function show(string $storyId): View
    {
        $story = Story::query()->findOrFail($storyId);

        return view('admin.lihat_refleksi', [
            'story' => $story,
            'questions' => $this->storyQuestions($storyId),
        ]);
    }

    public function edit(string $storyId): View|RedirectResponse
    {
        $story = Story::query()->findOrFail($storyId);
        $questions = $this->storyQuestions($storyId);
        if ($questions->isEmpty()) {
            return redirect()->route('admin.reflections.create');
        }

        return view('admin.edit_refleksi', [
            'story' => $story,
            'questions' => $this->formQuestions($questions),
        ]);
    }

    /**
     * Saves the edited list: kept questions keep their id (kids' answers stay linked),
     * new rows are added, removed rows are deleted with the kids' answers to them.
     * The order is the position in the form.
     */
    public function update(Request $request, string $storyId): RedirectResponse
    {
        Story::query()->findOrFail($storyId);
        $questions = $this->validatedQuestions($request);

        $existingIds = DB::table('reflections')->where('story_id', $storyId)->pluck('reflection_id')->map(fn ($id) => (int) $id);
        $keptIds = collect($questions)->pluck('id')->filter()->map(fn ($id) => (int) $id);
        if ($keptIds->diff($existingIds)->isNotEmpty() || $keptIds->duplicates()->isNotEmpty()) {
            throw ValidationException::withMessages(['questions' => 'Daftar pertanyaan tidak sesuai dengan cerita ini. Muat ulang halaman lalu coba lagi.']);
        }

        DB::transaction(function () use ($storyId, $questions, $existingIds, $keptIds) {
            $now = now();

            $this->deleteQuestions($storyId, $existingIds->diff($keptIds));

            // Move kept rows out of the way first, so the new order never clashes
            // with the unique (story_id, order_number) rule while it is being set.
            DB::table('reflections')->where('story_id', $storyId)->update(['order_number' => DB::raw('order_number + 100000')]);

            foreach ($questions as $i => $question) {
                $values = [
                    'question' => $question['text'],
                    'answer' => $question['answer'],
                    'order_number' => $i + 1,
                    'updated_at' => $now,
                ];
                if ($question['id']) {
                    DB::table('reflections')->where('reflection_id', $question['id'])->update($values);
                } else {
                    DB::table('reflections')->insert($values + ['story_id' => $storyId, 'created_at' => $now]);
                }
            }
        });

        return redirect()->route('admin.reflections.index')->with('success', 'Perubahan pertanyaan refleksi berhasil disimpan.');
    }

    /** Hapus: all questions of the story, with the kids' answers to them. */
    public function destroy(string $storyId): RedirectResponse
    {
        Story::query()->findOrFail($storyId);

        DB::transaction(fn () => $this->deleteQuestions(
            $storyId,
            DB::table('reflections')->where('story_id', $storyId)->pluck('reflection_id')
        ));

        return redirect()->route('admin.reflections.index')->with('success', 'Pertanyaan refleksi berhasil dihapus.');
    }

    /**
     * The posted rows, in form order: [['id' => ?int, 'text' => string, 'answer' => bool], ...].
     *
     * @return list<array{id: ?int, text: string, answer: bool}>
     */
    private function validatedQuestions(Request $request): array
    {
        $data = $request->validate([
            'questions' => ['required', 'array', 'min:1'],
            'questions.*.id' => ['nullable', 'integer'],
            'questions.*.text' => ['required', 'string', 'max:'.self::MAX_QUESTION_LENGTH],
            'questions.*.answer' => ['required', 'in:1,0'],
        ], [
            'questions.required' => 'Tambahkan minimal satu pertanyaan.',
            'questions.min' => 'Tambahkan minimal satu pertanyaan.',
            'questions.*.text.required' => 'Setiap pertanyaan wajib diisi.',
            'questions.*.text.max' => 'Pertanyaan maksimal '.self::MAX_QUESTION_LENGTH.' karakter.',
            'questions.*.answer.required' => 'Pilih jawaban benar (Iya atau Tidak) untuk setiap pertanyaan.',
            'questions.*.answer.in' => 'Pilih jawaban benar (Iya atau Tidak) untuk setiap pertanyaan.',
        ]);

        return array_values(array_map(fn (array $row) => [
            'id' => isset($row['id']) && $row['id'] !== '' ? (int) $row['id'] : null,
            'text' => trim($row['text']),
            'answer' => (string) $row['answer'] === '1',
        ], $data['questions']));
    }

    /**
     * Deletes the given questions of a story with the kids' answers to them, then the
     * kids' tries of that story that have no answer left.
     *
     * @param  Collection<int, int>  $reflectionIds
     */
    private function deleteQuestions(string $storyId, Collection $reflectionIds): void
    {
        if ($reflectionIds->isEmpty()) {
            return;
        }

        DB::table('reflection_answers')->whereIn('reflection_id', $reflectionIds)->delete();
        DB::table('reflections')->whereIn('reflection_id', $reflectionIds)->delete();

        DB::table('reflection_attempts')
            ->where('story_id', $storyId)
            ->whereNotExists(fn ($query) => $query->from('reflection_answers')
                ->whereColumn('reflection_answers.reflection_attempt_id', 'reflection_attempts.reflection_attempt_id'))
            ->delete();
    }

    /** A story's questions in order. */
    private function storyQuestions(string $storyId): Collection
    {
        return DB::table('reflections')
            ->where('story_id', $storyId)
            ->orderBy('order_number')
            ->get(['reflection_id', 'question', 'answer', 'order_number']);
    }

    /**
     * Rows for the Tambah/Edit form: after a refused save the typed rows (old input),
     * otherwise the saved questions, or one empty row.
     *
     * @return list<array{id: ?int, text: string, answer: ?string}>
     */
    private function formQuestions(Collection $saved): array
    {
        $old = old('questions');
        if (is_array($old)) {
            return array_values(array_map(fn ($row) => [
                'id' => isset($row['id']) && $row['id'] !== '' ? (int) $row['id'] : null,
                'text' => (string) ($row['text'] ?? ''),
                'answer' => isset($row['answer']) ? (string) $row['answer'] : null,
            ], $old));
        }

        if ($saved->isEmpty()) {
            return [['id' => null, 'text' => '', 'answer' => null]];
        }

        return $saved->map(fn ($q) => [
            'id' => (int) $q->reflection_id,
            'text' => $q->question,
            'answer' => $q->answer ? '1' : '0',
        ])->values()->all();
    }
}
