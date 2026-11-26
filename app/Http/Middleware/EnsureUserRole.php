<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Admin address => matching Orang Tua page. Other admin addresses go to the dashboard.
     */
    private const PARENT_EQUIVALENTS = [
        'admin/dashboard' => '/dashboard',
        'admin/profil' => '/profil-orangtua',
    ];

    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {
        $guard = Auth::guard('web');
        $user = $guard->user();
        $loginRoute = $role === 'admin' ? 'admin.login' : 'login';

        // Pengguna belum login: ke halaman login yang sesuai.
        // redirect()->guest() menyimpan alamat tujuan, sehingga setelah login
        // pengguna kembali ke halaman yang tadi dibuka.
        if (! $user) {
            return redirect()->guest(route($loginRoute))
                ->with('status', 'Silakan masuk terlebih dahulu.');
        }

        // Orang Tua membuka alamat Admin: diam-diam ke halaman Orang Tua yang setara
        // (atau dashboard), tanpa pesan, supaya tidak terlihat bahwa halaman Admin ada.
        if ($role === 'admin' && $user->role !== 'admin') {
            return redirect()->to(self::PARENT_EQUIVALENTS[$request->path()] ?? route('parent.dashboard'));
        }

        // Admin membuka halaman Orang Tua: ke login Orang Tua dengan pesan.
        if ($user->role !== $role) {
            return redirect()->guest(route($loginRoute))
                ->with('status', 'Silakan masuk sebagai Orang Tua untuk membuka halaman tersebut.');
        }

        // Pemeriksaan tambahan khusus Admin.
        if ($role === 'admin') {
            $allowedEmails = config('admin_access.allowed_emails', []);

            $userEmail = strtolower(trim((string) $user->email));

            // Admin yang emailnya tidak termasuk whitelist
            // tidak boleh mempertahankan akses Admin.
            if (! in_array($userEmail, $allowedEmails, true)) {
                $guard->logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}