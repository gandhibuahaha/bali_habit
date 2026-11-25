<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

/**
 * Parent-side child profiles: list, add, edit, delete.
 * A parent only ever reaches their own children; any other id gives 404.
 */
class ChildController extends Controller
{
    /** Form value => database value. */
    private const GENDERS = [
        'laki-laki' => 'male',
        'perempuan' => 'female',
    ];

    public function index(Request $request): View
    {
        $children = Child::where('parent_id', $request->user()->user_id)
            ->orderBy('created_at')
            ->get();

        return view('user.halaman_anak', ['children' => $children]);
    }

    public function create(): View
    {
        return view('user.tambah_anak');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $child = new Child($data);
        $child->parent_id = $request->user()->user_id;

        if ($request->hasFile('photo')) {
            $child->profile_picture = $request->file('photo')->store('children', 'public');
        }

        $child->save();

        return redirect()->route('children.index');
    }

    public function edit(Request $request, int $child): View
    {
        return view('user.edit_anak', ['child' => $this->findOwned($request, $child)]);
    }

    public function update(Request $request, int $child): RedirectResponse
    {
        $child = $this->findOwned($request, $child);
        $child->fill($this->validated($request));

        $oldPhoto = null;
        if ($request->hasFile('photo')) {
            $oldPhoto = $child->profile_picture;
            $child->profile_picture = $request->file('photo')->store('children', 'public');
        }

        $child->save();

        if ($oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()->route('children.index');
    }

    public function destroy(Request $request, int $child): RedirectResponse
    {
        $child = $this->findOwned($request, $child);
        $id = $child->child_id;

        // Foreign keys have no cascade, so progress rows go first (answers before attempts).
        DB::transaction(function () use ($child, $id) {
            DB::table('mission_answers')->whereIn(
                'mission_attempt_id',
                DB::table('mission_attempts')->select('mission_attempt_id')->where('child_id', $id)
            )->delete();
            DB::table('reflection_answers')->whereIn(
                'reflection_attempt_id',
                DB::table('reflection_attempts')->select('reflection_attempt_id')->where('child_id', $id)
            )->delete();

            foreach (['mission_attempts', 'reflection_attempts', 'story_progress', 'child_badges'] as $table) {
                DB::table($table)->where('child_id', $id)->delete();
            }

            $child->delete();
        });

        if ($child->profile_picture) {
            Storage::disk('public')->delete($child->profile_picture);
        }

        return redirect()->route('children.index');
    }

    private function findOwned(Request $request, int $id): Child
    {
        return Child::where('parent_id', $request->user()->user_id)->findOrFail($id);
    }

    /**
     * @return array{name: string, birth_date: string, gender: string}
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', 'in:'.implode(',', array_keys(self::GENDERS))],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            // Same texts as public/assets/js/form_anak.js, shown under each field.
            'name.required' => 'Nama anak wajib diisi.',
            'name.max' => 'Nama anak maksimal 100 karakter.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date' => 'Tanggal lahir tidak valid.',
            'birth_date.before_or_equal' => 'Tanggal lahir tidak boleh melewati hari ini.',
            'gender.required' => 'Pilih jenis kelamin anak.',
            'gender.in' => 'Pilih jenis kelamin anak.',
            'photo.image' => 'Foto harus berformat JPG, PNG, atau WEBP.',
            'photo.mimes' => 'Foto harus berformat JPG, PNG, atau WEBP.',
            'photo.max' => 'Ukuran foto maksimal 2 MB.',
            'photo.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya maksimal 2 MB.',
        ]);

        return [
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
            'gender' => self::GENDERS[$data['gender']],
        ];
    }
}
