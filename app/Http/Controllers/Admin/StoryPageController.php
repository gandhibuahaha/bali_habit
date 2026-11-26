<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryPage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RuntimeException;
use Throwable;

class StoryPageController extends Controller
{
    private const MAX_PAGES = 8;

    /**
     * Menampilkan form tambah halaman untuk cerita yang dipilih.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $storyId = $request->query('story_id');

        if (!$storyId) {
            return redirect()
                ->route('admin.stories.index')
                ->with('error', 'Pilih cerita terlebih dahulu sebelum menambahkan halaman.');
        }

        $story = Story::with('pages')->findOrFail($storyId);

        if ($story->pages->count() >= self::MAX_PAGES) {
            return redirect()
                ->route('admin.stories.show', $story->story_id)
                ->with('error', 'Cerita sudah mencapai batas maksimal 8 halaman.');
        }

        return view('admin.tambah_halaman_cerita', compact('story'));
    }

    /**
     * Menyimpan halaman cerita beserta ilustrasi dan audio tiga bahasa.
     */
    public function store(Request $request, string $storyId): RedirectResponse
    {
        $story = Story::findOrFail($storyId);

        if ($story->pages()->count() >= self::MAX_PAGES) {
            return redirect()
                ->route('admin.stories.show', $story->story_id)
                ->with('error', 'Cerita sudah mencapai batas maksimal 8 halaman.');
        }

        $validated = $request->validate([
            'page_number' => [
                'required',
                'integer',
                'min:1',
                'max:' . self::MAX_PAGES,
                Rule::unique('story_pages', 'page_number')
                    ->where(fn ($query) => $query->where('story_id', $story->story_id)),
            ],

            'illustration' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'balinese_text' => [
                'required',
                'string',
                'max:500',
            ],

            'balinese_audio' => [
                'required',
                'file',
                'mimes:mp3,wav',
                'max:5120',
            ],

            'indonesian_text' => [
                'required',
                'string',
                'max:500',
            ],

            'indonesian_audio' => [
                'required',
                'file',
                'mimes:mp3,wav',
                'max:5120',
            ],

            'english_text' => [
                'required',
                'string',
                'max:500',
            ],

            'english_audio' => [
                'required',
                'file',
                'mimes:mp3,wav',
                'max:5120',
            ],
        ], [
            'page_number.unique' => 'Nomor halaman tersebut sudah digunakan dalam cerita ini.',
            'illustration.max' => 'Ukuran ilustrasi maksimal 2 MB.',
            'balinese_audio.max' => 'Ukuran audio Bahasa Bali maksimal 5 MB.',
            'indonesian_audio.max' => 'Ukuran audio Bahasa Indonesia maksimal 5 MB.',
            'english_audio.max' => 'Ukuran English Audio maksimal 5 MB.',
        ]);

        $storedPaths = [];

        try {
            $fileDirectories = [
                'illustration' => 'stories/pages/illustrations',
                'balinese_audio' => 'stories/pages/audio/balinese',
                'indonesian_audio' => 'stories/pages/audio/indonesian',
                'english_audio' => 'stories/pages/audio/english',
            ];

            // Menyimpan semua file ke storage public.
            foreach ($fileDirectories as $field => $directory) {
                $path = $request->file($field)->store($directory, 'public');

                if (!$path) {
                    throw new RuntimeException('Gagal menyimpan file ' . $field . '.');
                }

                $storedPaths[$field] = $path;
            }

            DB::transaction(function () use ($story, $validated, $storedPaths) {
                // Mengunci data cerita selama proses penyimpanan.
                $lockedStory = Story::where('story_id', $story->story_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // Memastikan jumlah halaman tidak melebihi 8.
                if ($lockedStory->pages()->count() >= self::MAX_PAGES) {
                    throw new RuntimeException(
                        'Cerita sudah mencapai batas maksimal 8 halaman.'
                    );
                }

                StoryPage::create([
                    'story_id' => $lockedStory->story_id,
                    'page_number' => $validated['page_number'],
                    'illustration' => $storedPaths['illustration'],

                    'balinese_text' => $validated['balinese_text'],
                    'balinese_audio' => $storedPaths['balinese_audio'],

                    'indonesian_text' => $validated['indonesian_text'],
                    'indonesian_audio' => $storedPaths['indonesian_audio'],

                    'english_text' => $validated['english_text'],
                    'english_audio' => $storedPaths['english_audio'],
                ]);
            });

        } catch (Throwable $exception) {

            // Menghapus file jika proses penyimpanan database gagal.
            if (!empty($storedPaths)) {
                Storage::disk('public')->delete(array_values($storedPaths));
            }

            if (
                $exception instanceof RuntimeException &&
                str_contains($exception->getMessage(), 'maksimal 8 halaman')
            ) {
                return redirect()
                    ->route('admin.stories.show', $story->story_id)
                    ->with('error', $exception->getMessage());
            }

            throw $exception;
        }

        return redirect()
            ->route('admin.stories.show', $story->story_id)
            ->with(
                'success',
                'Halaman ' . $validated['page_number'] . ' berhasil ditambahkan.'
            );
    }
}
