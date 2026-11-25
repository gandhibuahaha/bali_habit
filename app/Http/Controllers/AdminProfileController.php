<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
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

        $user->save();

        return redirect()
            ->route('admin.profile')
            ->with('status', 'Profil Admin berhasil diperbarui.');
    }
}