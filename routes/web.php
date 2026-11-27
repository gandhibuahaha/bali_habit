<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ReflectionController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\StoryPageController;
use App\Http\Controllers\Admin\UserManagementController as AdminUserManagementController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ChildProgressController;
use App\Http\Controllers\ParentDashboardController;
use App\Http\Controllers\ParentProfileController;

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
// cache.headers no_store: the browser keeps no copy of logged-in pages, so after logout
// the Back button can't show them again (D-32).
Route::middleware([EnsureUserRole::class . ':parent', 'cache.headers:no_store;private'])->group(function () {
    Route::get('/dashboard', [ParentDashboardController::class, 'index'])->name('parent.dashboard');
    Route::get('/halaman-anak', [ChildController::class, 'index'])->name('children.index');
    Route::view('/profil-orangtua', 'user.profil_orangtua');
    Route::get('/progress-anak', [ChildProgressController::class, 'progress'])->name('children.progress');
    Route::get('/belajar-bersama', [ChildProgressController::class, 'learn'])->name('children.learn');
    Route::get('/tambah-anak', [ChildController::class, 'create'])->name('children.create');
    Route::post('/tambah-anak', [ChildController::class, 'store'])->name('children.store');
    Route::get('/edit-anak/{child}', [ChildController::class, 'edit'])->whereNumber('child')->name('children.edit');
    Route::put('/edit-anak/{child}', [ChildController::class, 'update'])->whereNumber('child')->name('children.update');
    Route::delete('/edit-anak/{child}', [ChildController::class, 'destroy'])->whereNumber('child')->name('children.destroy');
    Route::get('/halaman-baca', [ChildProgressController::class, 'readingPage'])->name('stories.read.show');
    // Selesai membaca (dihitung sekali per kunjungan). block(): permintaan bersamaan dari sesi yang sama dijalankan bergantian.
    Route::post('/halaman-baca', [ChildProgressController::class, 'finishReading'])->name('stories.read')->block(10, 10);
    Route::get('/halaman-refleksi', [ChildProgressController::class, 'reflectionPage'])->name('reflections.show');
    Route::post('/halaman-refleksi', [ChildProgressController::class, 'saveReflections'])->name('reflections.store');
    Route::get('/halaman-misi', [ChildProgressController::class, 'missionPage'])->name('missions.show');
    Route::post('/halaman-misi', [ChildProgressController::class, 'saveMissions'])->name('missions.store');
    Route::get('/rekap-cerita', [ChildProgressController::class, 'recapPage'])->name('stories.recap');
    Route::view('/edit-profil', 'user.edit_profil');
    Route::put('/edit-profil', [ParentProfileController::class, 'update'])->name('parent.profile.update');
    Route::view('/ubah-sandi', 'user.ubah_sandi');
    Route::put('/ubah-sandi', [ParentProfileController::class, 'updatePassword'])->name('parent.password.update');
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
Route::prefix('admin')->middleware([EnsureUserRole::class . ':admin', 'cache.headers:no_store;private'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-management', [AdminUserManagementController::class, 'parents'])->name('admin.users.parents');
    Route::get('/user-management-anak', [AdminUserManagementController::class, 'children'])->name('admin.users.children');
    Route::get('/aktivitas-pengguna', [AdminUserManagementController::class, 'activities'])->name('admin.users.activities');

   /*
    |--------------------------------------------------------------------------
    | STORY MANAGEMENT
    |--------------------------------------------------------------------------
    */

    // Menampilkan daftar cerita
    Route::get('/story-management', [
        StoryController::class,
        'index'
    ])->name('admin.stories.index');

    // Menampilkan form tambah cerita
    Route::get('/tambah-cerita', [
        StoryController::class,
        'create'
    ])->name('admin.stories.create');

    // Menyimpan cerita baru
    Route::post('/story-management', [
        StoryController::class,
        'store'
    ])->name('admin.stories.store');

    // Menampilkan detail cerita
    Route::get('/detail-cerita/{storyId}', [
        StoryController::class,
        'show'
    ])->name('admin.stories.show');

    // Menampilkan form edit cerita
    Route::get('/edit-cerita/{storyId}', [
        StoryController::class,
        'edit'
    ])->name('admin.stories.edit');

    // Menyimpan perubahan cerita
    Route::put('/edit-cerita/{storyId}', [
        StoryController::class,
        'update'
    ])->name('admin.stories.update');

    // Menghapus cerita
    Route::delete('/story-management/{storyId}', [
        StoryController::class,
        'destroy'
    ])->name('admin.stories.destroy');

    Route::get('/tambah-halaman-cerita', [StoryPageController::class, 'create'])
        ->name('admin.story-pages.create');

    Route::post('/tambah-halaman-cerita/{storyId}', [StoryPageController::class, 'store'])
        ->name('admin.story-pages.store');
    Route::view('/edit-halaman-cerita', 'admin.edit_halaman_cerita');

    /*
    | REFLEKSI MANAGEMENT (D-35, D-36)
    */
    Route::get('/refleksi-management', [ReflectionController::class, 'index'])->name('admin.reflections.index');
    Route::get('/tambah-refleksi', [ReflectionController::class, 'create'])->name('admin.reflections.create');
    Route::post('/refleksi-management', [ReflectionController::class, 'store'])->name('admin.reflections.store');
    Route::get('/lihat-refleksi/{storyId}', [ReflectionController::class, 'show'])->name('admin.reflections.show');
    Route::get('/edit-refleksi/{storyId}', [ReflectionController::class, 'edit'])->name('admin.reflections.edit');
    Route::put('/edit-refleksi/{storyId}', [ReflectionController::class, 'update'])->name('admin.reflections.update');
    Route::delete('/refleksi-management/{storyId}', [ReflectionController::class, 'destroy'])->name('admin.reflections.destroy');

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
