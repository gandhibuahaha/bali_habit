<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProfileController;

/* Halaman publik */
Route::view('/', 'user.index')->name('home');
Route::view('/cerita', 'user.cerita')->name('cerita');
Route::view('/tentang', 'user.tentang')->name('tentang');
Route::view('/detail-cerita', 'user.detail_cerita')->name('detail-cerita');

/* Autentikasi Parent */
Route::view('/login', 'user.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('login.store');

Route::view('/registrasi', 'user.registrasi')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('register.store');

Route::view('/lupa-sandi', 'user.lupa_sandi')->name('password.request');

/* Halaman yang hanya dapat diakses akun Parent */
Route::middleware(EnsureUserRole::class . ':parent')->group(function () {
    Route::view('/dashboard', 'user.dashboard')->name('parent.dashboard');
    Route::view('/halaman-anak', 'user.halaman_anak');
    Route::view('/profil-orangtua', 'user.profil_orangtua');
    Route::view('/progress-anak', 'user.progress_anak');
    Route::view('/belajar-bersama', 'user.belajar_bersama');
    Route::view('/tambah-anak', 'user.tambah_anak');
    Route::view('/edit-anak', 'user.edit_anak');
    Route::view('/halaman-baca', 'user.halaman_baca');
    Route::view('/halaman-refleksi', 'user.halaman_refleksi');
    Route::view('/halaman-misi', 'user.halaman_misi');
    Route::view('/rekap-cerita', 'user.rekap_cerita');
    Route::view('/edit-profil', 'user.edit_profil');
    Route::view('/ubah-sandi', 'user.ubah_sandi');
    Route::view('/halaman-bantuan', 'user.halaman_bantuan');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


/* Halaman Login Admin dapat dibuka untuk pergantian akun.
   Dashboard Admin tetap dilindungi middleware EnsureUserRole. */

Route::view('/admin/login', 'admin.login_admin')
    ->name('admin.login');

Route::post('/admin/login', [
    AuthenticatedSessionController::class,
    'adminStore'
])
    ->middleware('throttle:10,1')
    ->name('admin.login.store');

/* Halaman lupa sandi Admin */
Route::view('/admin/lupa-sandi', 'admin.lupa_sandi_admin')
    ->name('admin.password.request');


/* Seluruh halaman manajemen Admin memerlukan role admin */
Route::prefix('admin')->middleware(EnsureUserRole::class . ':admin')->group(function () {
    Route::view('/dashboard', 'admin.beranda_admin')->name('admin.dashboard');
    Route::view('/user-management', 'admin.user_management_ortu');
    Route::view('/user-management-anak', 'admin.user_management_anak');
    Route::view('/aktivitas-pengguna', 'admin.aktivitas_pengguna');

    Route::view('/story-management', 'admin.story_management');
    Route::view('/tambah-cerita', 'admin.tambah_cerita');
    Route::view('/edit-cerita', 'admin.edit_cerita');
    Route::view('/detail-cerita', 'admin.detail_cerita');
    Route::view('/edit-halaman-cerita', 'admin.edit_halaman_cerita');
    Route::view('/tambah-halaman-cerita', 'admin.tambah_halaman_cerita');

    Route::view('/refleksi-management', 'admin.refleksi_management');
    Route::view('/tambah-refleksi', 'admin.tambah_refleksi');
    Route::view('/edit-refleksi', 'admin.edit_refleksi');
    Route::view('/lihat-refleksi', 'admin.lihat_refleksi');

    Route::view('/mission-management', 'admin.mission_management');
    Route::view('/edit-misi', 'admin.edit_misi');
    Route::view('/tambah-misi', 'admin.tambah_misi');
    Route::view('/lihat-misi', 'admin.lihat_misi');

    Route::view('/lencana-management', 'admin.lencana_management');
    Route::view('/tambah-lencana', 'admin.tambah_lencana');
    Route::view('/edit-lencana', 'admin.edit_lencana');
    Route::view('/profil', 'admin.profil_admin')
    ->name('admin.profile');

    Route::post('/profil', [
        AdminProfileController::class,
        'update'
    ])->name('admin.profile.update');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});
