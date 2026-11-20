<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});
Route::get('/cerita', function () {
    return view('user.cerita');
});
Route::get('/tentang', function () {
    return view('user.tentang');
});
Route::get('/detail-cerita', function () {
    return view('user.detail_cerita');
});
Route::get('/login', function () {
    return view('user.login');
});
Route::get('/registrasi', function () {
    return view('user.registrasi');
});
Route::get('/lupa-sandi', function () {
    return view('user.lupa_sandi');
});
Route::get('/dashboard', function () {
    return view('user.dashboard');
});
Route::get('/halaman-anak', function () {
    return view('user.halaman_anak');
});
Route::get('/profil-orangtua', function () {
    return view('user.profil_orangtua');
});
Route::get('/progress-anak', function () {
    return view('user.progress_anak');
});
Route::get('/belajar-bersama', function () {
    return view('user.belajar_bersama');
});
Route::get('/tambah-anak', function () {
    return view('user.tambah_anak');
});
Route::get('/edit-anak', function () {
    return view('user.edit_anak');
});
Route::get('/halaman-baca', function () {
    return view('user.halaman_baca');
});
Route::get('/halaman-refleksi', function () {
    return view('user.halaman_refleksi');
});
Route::get('/halaman-misi', function () {
    return view('user.halaman_misi');
});
Route::get('/rekap-cerita', function () {
    return view('user.rekap_cerita');
});
Route::get('/edit-profil', function () {
    return view('user.edit_profil');
});
Route::get('/ubah-sandi', function () {
    return view('user.ubah_sandi');
});
Route::get('/halaman-bantuan', function () {
    return view('user.halaman_bantuan');
});

Route::get('/admin/login', function () {
    return view('admin.login_admin');
});
Route::get('/admin/lupa-sandi', function () {
    return view('admin.lupa_sandi_admin');
});
Route::get('/admin/dashboard', function () {
    return view('admin.beranda_admin');
});
Route::get('/admin/user-management', function () {
    return view('admin.user_management_ortu');
});
Route::get('/admin/user-management-anak', function () {
    return view('admin.user_management_anak');
});
Route::get('/admin/aktivitas-pengguna', function () {
    return view('admin.aktivitas_pengguna');
});
Route::get('/admin/story-management', function () {
    return view('admin.story_management');
});
Route::get('/admin/tambah-cerita', function () {
    return view('admin.tambah_cerita');
});
Route::get('/admin/edit-cerita', function () {
    return view('admin.edit_cerita');
});
Route::get('/admin/detail-cerita', function () {
    return view('admin.detail_cerita');
});
Route::get('/admin/edit-halaman-cerita', function () {
    return view('admin.edit_halaman_cerita');
});
Route::get('/admin/tambah-halaman-cerita', function () {
    return view('admin.tambah_halaman_cerita');
});
Route::get('/admin/refleksi-management', function () {
    return view('admin.refleksi_management');
});
Route::get('/admin/tambah-refleksi', function () {
    return view('admin.tambah_refleksi');
});
Route::get('/admin/edit-refleksi', function () {
    return view('admin.edit_refleksi');
});
Route::get('/admin/lihat-refleksi', function () {
    return view('admin.lihat_refleksi');
});
Route::get('/admin/mission-management', function () {
    return view('admin.mission_management');
});
Route::get('/admin/edit-misi', function () {
    return view('admin.edit_misi');
});
Route::get('/admin/tambah-misi', function () {
    return view('admin.tambah_misi');
});
Route::get('/admin/lihat-misi', function () {
    return view('admin.lihat_misi');
});
Route::get('/admin/lencana-management', function () {
    return view('admin.lencana_management');
});
Route::get('/admin/tambah-lencana', function () {
    return view('admin.tambah_lencana');
});
Route::get('/admin/edit-lencana', function () {
    return view('admin.edit_lencana');
});
Route::get('/admin/profil', function () {
    return view('admin.profil_admin');
});