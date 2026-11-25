<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Pengamanan tambahan untuk akun Admin whitelist.
        $allowedEmails = config('admin_access.allowed_emails', []);

        abort_unless(
            $user &&
            $user->role === 'admin' &&
            in_array(
                strtolower(trim($user->email)),
                $allowedEmails,
                true
            ),
            403,
            'Anda tidak memiliki izin mengubah profil Admin.'
        );

        // Normalisasi nomor telepon menjadi format internasional.
        $phone = preg_replace(
            '/\D+/',
            '',
            (string) $request->input('no_tlp', '')
        );

        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (str_starts_with($phone, '8')) {
            $phone = '62' . $phone;
        }

        $request->merge([
            'no_tlp' => $phone,
        ]);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'no_tlp' => [
                'required',
                'string',
                'regex:/^62[0-9]{8,11}$/',
                Rule::unique('users', 'no_tlp')
                    ->ignore($user->user_id, 'user_id'),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ], [
            // Pesan validasi dalam Bahasa Indonesia (ditampilkan di bawah tiap field).
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap maksimal 100 karakter.',
            'no_tlp.required' => 'Nomor telepon WhatsApp wajib diisi.',
            'no_tlp.regex' => 'Nomor telepon tidak valid. Contoh: 0812-3456-7890.',
            'no_tlp.unique' => 'Nomor telepon sudah dipakai akun lain.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'photo.image' => 'Format foto harus JPG atau PNG.',
            'photo.mimes' => 'Format foto harus JPG atau PNG.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
            'photo.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya maksimal 2MB.',
        ]);

        // Perbarui informasi dasar.
        $user->name = $validated['name'];
        $user->no_tlp = $validated['no_tlp'];

        // Password hanya berubah jika diisi.
        if (!empty($validated['password'])) {
            $user->password = Hash::make(
                $validated['password']
            );
        }

        // Foto profil (opsional): simpan yang baru, hapus file lama setelah tersimpan.
        $oldPhoto = null;
        if ($request->hasFile('photo')) {
            $oldPhoto = $user->profile_picture;
            $user->profile_picture = $request->file('photo')->store('users', 'public');
        }

        $user->save();

        if ($oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()
            ->route('admin.profile')
            ->with('status', 'Profil Admin berhasil diperbarui.');
    }
}