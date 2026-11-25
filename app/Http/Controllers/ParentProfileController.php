<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

/**
 * The logged-in parent's own profile (Edit Profil page).
 */
class ParentProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Phone is typed after a fixed "+62" box; store it like AdminProfileController does (62...).
        $request->merge(['no_telepon' => $this->normalizePhone($request->input('no_telepon'))]);

        $data = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'no_telepon' => [
                'nullable',
                'regex:/^62[0-9]{8,11}$/',
                Rule::unique('users', 'no_tlp')->ignore($user->user_id, 'user_id'),
            ],
            'foto_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 100 karakter.',
            'no_telepon.regex' => 'Nomor telepon tidak valid. Contoh: 812-3456-7890.',
            'no_telepon.unique' => 'Nomor telepon sudah dipakai akun lain.',
            'foto_profil.image' => 'Format file harus JPG atau PNG.',
            'foto_profil.mimes' => 'Format file harus JPG atau PNG.',
            'foto_profil.max' => 'Ukuran foto maksimal 2MB.',
            'foto_profil.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya maksimal 2MB.',
        ]);

        $user->name = $data['nama_lengkap'];
        $user->no_tlp = $data['no_telepon'];

        $oldPhoto = null;
        if ($request->hasFile('foto_profil')) {
            $oldPhoto = $user->profile_picture;
            $user->profile_picture = $request->file('foto_profil')->store('users', 'public');
        }

        $user->save();

        if ($oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect('/profil-orangtua')->with('status', 'Profil berhasil diperbarui.');
    }

    /**
     * Ubah Sandi: the old password must be correct; the new one follows the
     * registration rule (min 8 characters). The User model hashes it on save.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8'],
            // Checked on the confirmation field so the message shows under it on the page.
            'new_password_confirmation' => ['required', 'same:new_password'],
        ], [
            'current_password.required' => 'Kata sandi saat ini tidak boleh kosong.',
            'current_password.current_password' => 'Kata sandi saat ini salah.',
            'new_password.required' => 'Kata sandi baru tidak boleh kosong.',
            'new_password.min' => 'Kata sandi harus minimal 8 karakter.',
            'new_password_confirmation.required' => 'Konfirmasi kata sandi tidak boleh kosong.',
            'new_password_confirmation.same' => 'Kata sandi tidak cocok.',
        ]);

        $user = $request->user();
        $user->password = $data['new_password'];
        $user->save();

        return redirect('/profil-orangtua')->with('status', 'Kata sandi berhasil diubah.');
    }

    private function normalizePhone(?string $phone): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $phone);

        if ($digits === '') {
            return null;
        }
        if (str_starts_with($digits, '0')) {
            return '62'.substr($digits, 1);
        }
        if (str_starts_with($digits, '8')) {
            return '62'.$digits;
        }

        return $digits;
    }
}
