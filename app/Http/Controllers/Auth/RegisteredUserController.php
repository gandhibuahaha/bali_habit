<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        // Registrasi mengikuti field yang memang tersedia pada form GitHub.
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'Email sudah terdaftar. Gunakan email lain atau masuk ke akun Anda.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal terdiri dari 8 karakter.',
        ]);

        // Username dibuat oleh Backend karena form GitHub tidak meminta username.
        $baseUsername = Str::slug($validated['name']);
        $baseUsername = $baseUsername !== '' ? $baseUsername : 'parent';
        $baseUsername = mb_substr($baseUsername, 0, 85);

        $username = $baseUsername;
        $suffix = 1;

        while (User::query()->where('username', $username)->exists()) {
            $suffixText = '-' . $suffix++;
            $username = mb_substr($baseUsername, 0, 100 - mb_strlen($suffixText)) . $suffixText;
        }

        $user = new User([
            'username' => $username,
            'name' => $validated['name'],
            'email' => $validated['email'],
            // Dua informasi ini tetap tersedia pada schema, tetapi sementara opsional.
            'no_tlp' => null,
            'kota' => null,
            'password' => $validated['password'],
        ]);

        // Role tidak diambil dari request agar registrasi publik tidak dapat membuat Admin.
        $user->role = 'parent';
        $user->save();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Registrasi Parent berhasil.',
                'user' => $user->only([
                    'user_id', 'username', 'name', 'email', 'no_tlp', 'kota', 'role',
                ]),
            ], 201);
        }

        return redirect()
            ->route('login')
            ->with('status', 'Registrasi berhasil. Silakan masuk menggunakan akun Anda.');
    }
}
