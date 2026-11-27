<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Menampilkan daftar cerita.
     * Mendukung pencarian, filter status, dan pagination.
     */
    public function index(Request $request): View
    {
        $query = Story::query()->withCount('pages');

        // Pencarian berdasarkan judul cerita
        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter status cerita
        if (in_array($request->status, ['active', 'inactive'], true)) {
            $query->where('status', $request->status);
        }

        $stories = $query
            ->orderBy('story_order')
            ->paginate(5)
            ->withQueryString();

        return view('admin.story_management', compact('stories'));
    }

    /**
     * Menampilkan halaman tambah cerita.
     */
    public function create(): View
    {
        return view('admin.tambah_cerita');
    }

    /**
     * Menyimpan cerita baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:300'],
            'cover_image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $coverPath = null;

        // Upload cover apabila tersedia
        if ($request->hasFile('cover_image')) {
            $coverPath = $request
                ->file('cover_image')
                ->store('stories/covers', 'public');
        }

        // Membuat ID cerita unik, maksimal 20 karakter
        $storyId = $this->generateStoryId();

        // Menentukan urutan cerita berikutnya
        $nextOrder = ((int) Story::max('story_order')) + 1;

        try {
            Story::create([
                'story_id' => $storyId,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'cover_image' => $coverPath,
                'status' => $validated['status'],
                'story_order' => $nextOrder,
            ]);
        } catch (\Throwable $e) {
            // Hapus file jika penyimpanan database gagal
            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }

            throw $e;
        }

        return redirect()
            ->route('admin.stories.index')
            ->with('success', 'Cerita berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail cerita beserta halaman-halamannya.
     */
    public function show(string $storyId): View
    {
        $story = Story::with('pages')
            ->withCount('pages')
            ->findOrFail($storyId);

        return view('admin.detail_cerita', compact('story'));
    }

    /**
     * Menampilkan form edit cerita.
     */
    public function edit(string $storyId): View
    {
        $story = Story::findOrFail($storyId);

        return view('admin.edit_cerita', compact('story'));
    }

    /**
     * Memperbarui informasi cerita.
     */
    public function update(Request $request, string $storyId): RedirectResponse
    {
        $story = Story::findOrFail($storyId);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:300'],
            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $oldCover = $story->cover_image;
        $newCover = $oldCover;

        // Ganti cover apabila admin mengunggah gambar baru
        if ($request->hasFile('cover_image')) {
            $newCover = $request
                ->file('cover_image')
                ->store('stories/covers', 'public');
        }

        try {
            $story->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'cover_image' => $newCover,
                'status' => $validated['status'],
            ]);
        } catch (\Throwable $e) {
            if ($newCover !== $oldCover && $newCover) {
                Storage::disk('public')->delete($newCover);
            }

            throw $e;
        }

        // Hapus cover lama setelah update berhasil
        if ($newCover !== $oldCover && $oldCover) {
            Storage::disk('public')->delete($oldCover);
        }

        return redirect()
            ->route('admin.stories.index')
            ->with('success', 'Cerita berhasil diperbarui.');
    }

    /**
     * Menghapus cerita yang belum memiliki data terkait.
     *
     * Cerita yang sudah digunakan dalam aktivitas anak,
     * misi, refleksi, atau memiliki halaman tidak boleh
     * dihapus permanen agar riwayat tetap aman.
     */
    public function destroy(string $storyId): RedirectResponse
    {
        $story = Story::findOrFail($storyId);

        $relatedTables = [
            'story_pages',
            'missions',
            'mission_attempts',
            'reflections',
            'reflection_attempts',
            'story_progress',
        ];

        foreach ($relatedTables as $table) {
            $hasRelatedData = DB::table($table)
                ->where('story_id', $story->story_id)
                ->exists();

            if ($hasRelatedData) {
                return back()->with(
                    'error',
                    'Cerita tidak dapat dihapus karena masih memiliki halaman atau data aktivitas terkait. Nonaktifkan cerita sebagai gantinya.'
                );
            }
        }

        $coverPath = $story->cover_image;

        $story->delete();

        if ($coverPath) {
            Storage::disk('public')->delete($coverPath);
        }

        return redirect()
            ->route('admin.stories.index')
            ->with('success', 'Cerita berhasil dihapus.');
    }

    /**
     * Membuat ID cerita unik sebanyak 20 karakter.
     */
    private function generateStoryId(): string
    {
        do {
            $storyId = 'STR'
                . now()->format('ymd')
                . Str::upper(Str::random(11));
        } while (Story::where('story_id', $storyId)->exists());

        return $storyId;
    }
}
