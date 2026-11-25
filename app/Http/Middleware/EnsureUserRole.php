<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {
        $guard = Auth::guard('web');
        $user = $guard->user();

        // Pengguna belum login.
        if (! $user) {
            return redirect()->guest(
                route($role === 'admin' ? 'admin.login' : 'login')
            );
        }

        // Periksa role pengguna.
        abort_unless(
            $user->role === $role,
            403,
            'Anda tidak memiliki akses ke halaman ini.'
        );

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