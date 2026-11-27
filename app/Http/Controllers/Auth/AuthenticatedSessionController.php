<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Set by destroy(): this browser session logged out on purpose. Holds the path of the
     * page the logout happened on (or true when unknown). See redirectAfterLogin(), D-33.
     */
    private const LOGGED_OUT_KEY = 'logged_out';

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

        // Kembali ke halaman yang tadi dibuka (jika halaman Orang Tua), selain itu ke dashboard.
        return $this->redirectAfterLogin($request, false, route('parent.dashboard'));
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

        // Password harus benar dan role harus admin.
        $credentials = [
            'email' => $email,
            'password' => $validated['password'],
            'role' => 'admin',
        ];

        // Email harus termasuk whitelist. Untuk email di luar whitelist, pemeriksaan
        // kata sandi tetap dijalankan (hasilnya diabaikan) supaya jawaban selalu
        // memakan waktu yang sama: Laravel membuat pemeriksaan yang gagal berlangsung
        // minimal 0,2 detik. Tanpa ini, penolakan yang lebih cepat membocorkan email
        // mana yang termasuk daftar Admin.
        $allowed = in_array($email, $allowedEmails, true);
        if (! $allowed) {
            Auth::guard('web')->validate($credentials);
        }

        if (! $allowed || ! Auth::guard('web')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi tidak sesuai atau akun tidak diizinkan sebagai administrator.',
                ])
                ->onlyInput('email');
        }

        // Perbarui session setelah autentikasi berhasil.
        $request->session()->regenerate();

        // Kembali ke halaman Admin yang tadi dibuka, selain itu ke dashboard Admin.
        return $this->redirectAfterLogin($request, true, route('admin.dashboard'));
    }

    /**
     * Halaman tujuan setelah login: alamat yang tadi dibuka (disimpan oleh
     * EnsureUserRole lewat redirect()->guest()), tetapi hanya jika sesuai jenis
     * akunnya (/admin/... untuk Admin, selain itu untuk Orang Tua). Jika tidak
     * sesuai, ke $fallback, supaya pengguna tidak dipantulkan ke login lagi.
     */
    private function redirectAfterLogin(Request $request, bool $isAdmin, string $fallback): RedirectResponse
    {
        $intended = $request->session()->pull('url.intended');
        $loggedOutFrom = $request->session()->pull(self::LOGGED_OUT_KEY);

        // Logged out on purpose earlier in this browser session (D-33):
        // - coming back to the page they logged out from (e.g. with Back) -> dashboard;
        // - any other page they opened (e.g. a typed address) -> that page, as usual;
        // - page of the logout unknown -> dashboard.
        if ($loggedOutFrom !== null
            && (! is_string($loggedOutFrom) || ! is_string($intended) || self::pathOf($intended) === $loggedOutFrom)) {
            return redirect()->to($fallback);
        }

        if (is_string($intended)) {
            $path = self::pathOf($intended);
            $isAdminPage = $path === '/admin' || str_starts_with($path, '/admin/');

            if ($isAdminPage === $isAdmin) {
                return redirect()->to($intended);
            }
        }

        return redirect()->to($fallback);
    }

    /** "/admin/user-management" for "http://host/admin/user-management?x=1". */
    private static function pathOf(string $url): string
    {
        return '/'.ltrim((string) parse_url($url, PHP_URL_PATH), '/');
    }

    /**
     * Logout Parent maupun Admin.
     */

    public function destroy(Request $request): RedirectResponse
    {
        $guard = Auth::guard('web');

        // Simpan informasi role sebelum sesi diakhiri.
        $isAdmin = $guard->user()?->role === 'admin';

        // Halaman tempat tombol Keluar ditekan (form logout dikirim dari halaman itu).
        $referer = $request->headers->get('referer');
        $loggedOutFrom = is_string($referer) && $referer !== '' ? self::pathOf($referer) : true;

        $guard->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Tandai: keluar atas kemauan sendiri, dari halaman ini. Login berikutnya lewat
        // halaman yang sama (mis. tombol Back) ke dashboard; lewat halaman lain ke halaman
        // itu (lihat redirectAfterLogin(), D-33).
        $request->session()->put(self::LOGGED_OUT_KEY, $loggedOutFrom);

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