<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Login Parent.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'email' => strtolower(trim($validated['email'])),
            'password' => $validated['password'],
            'role' => 'parent',
        ];

        if (! Auth::guard('web')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi tidak sesuai dengan akun orang tua.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('parent.dashboard');
    }

    /**
     * Login Admin dengan whitelist dua email resmi.
     */
    public function adminStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string'],
        ]);

        $email = strtolower(trim($validated['email']));

        // Ambil daftar email Admin dari konfigurasi privat.
        $allowedEmails = config('admin_access.allowed_emails', []);

        // Pemeriksaan pertama: email harus termasuk whitelist.
        if (! in_array($email, $allowedEmails, true)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi tidak sesuai atau akun tidak diizinkan sebagai administrator.',
                ])
                ->onlyInput('email');
        }

        // Pemeriksaan kedua dan ketiga:
        // Password harus benar dan role harus admin.
        $credentials = [
            'email' => $email,
            'password' => $validated['password'],
            'role' => 'admin',
        ];

        if (! Auth::guard('web')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi tidak sesuai atau akun tidak diizinkan sebagai administrator.',
                ])
                ->onlyInput('email');
        }

        // Perbarui session setelah autentikasi berhasil.
        $request->session()->regenerate();

        // Admin selalu diarahkan ke dashboard Admin.
        return redirect()->route('admin.dashboard');
    }

    /**
     * Logout Parent maupun Admin.
     */

    public function destroy(Request $request): RedirectResponse
    {
        $guard = Auth::guard('web');

        // Simpan informasi role sebelum sesi diakhiri.
        $isAdmin = $guard->user()?->role === 'admin';

        $guard->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Admin kembali ke halaman login Admin.
        if ($isAdmin) {
            return redirect()
                ->route('admin.login')
                ->with('status', 'Anda telah keluar dari Admin Panel.');
        }

        // Parent kembali ke halaman utama.
        return redirect()
            ->route('home')
            ->with('status', 'Anda telah keluar dari akun.');
    }
}