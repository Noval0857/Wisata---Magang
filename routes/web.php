<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/profile-user', function () {
    return view('user/profile-user');
})->name('profile-user');

Route::get('/edit-user', function () {
    return view('user/edit-user');
})->name('edit-user');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/adminindex', function () {
    return view('admin.adminindex');
})->name('adminindex');

Route::get('/', [WisataController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');

Route::post('/simpanregistrasi', [RegistrasiController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Route::get('/data_kuliner', [KulinerController::class, 'index'])->name('data_kuliner');

Route::get('/detail-wisata/{nama_wisata}', [WisataController::class, 'detail'])->name('detail-wisata');

// Protected routes (requires authentication)
Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin', [WisataController::class, 'show'])->name('admin');

    Route::get('/tambah-data-wisata', [WisataController::class, 'viewTambah'])->name('tambah-data-wisata');

    Route::get('/data-wisata', [WisataController::class, 'index'])->name('data-wisata');

    Route::post('/simpan-data', [WisataController::class, 'simpandata'])->name('simpan-data');

    Route::get('/ubah-data-wisata/{id}', [WisataController::class, 'ubahdata'])->name('ubah-data-wisata');

    Route::post('/simpan-data-wisata/{id}', [WisataController::class, 'updatedata'])->name('simpan-data-wisata');

    Route::delete('/hapus-data-wisata/{id}', [WisataController::class, 'hapusdata'])->name('hapus-data-wisata');

    Route::get('/komentar', [CommentController::class, 'index'])->name('komentar');

    Route::post('/komentar/approve/{id}', [CommentController::class, 'approveComment'])->name('komentar.approve');

    Route::get('/foto-wisata', [WisataController::class, 'tampil_foto_wisata'])->name('foto-wisata');

    Route::get('/tambah-foto-wisata', [WisataController::class, 'viewTambah_foto_wisata'])->name('tambah-foto-wisata');

    Route::post('/simpan-foto-wisata', [WisataController::class, 'simpan_foto_wisata'])->name('simpan-foto-wisata');

    Route::get('/kategori-wisata', [WisataController::class, 'kategori_wisata'])->name('kategori-wisata');

    Route::get('/view-tambah-kategori-wisata', [WisataController::class, 'view_tambah_kategori_wisata'])->name('view-tambah-kategori-wisata');

    Route::post('/tambah-kategori-wisata', [WisataController::class, 'tambah_kategori_wisata'])->name('tambah-kategori-wisata');

    Route::get('/view-edit-kategori-wisata/{id}', [WisataController::class, 'view_ubah_kategori_wisata'])->name('view-edit-kategori-wisata');

    Route::post('/update-kategori-wisata/{id}', [WisataController::class, 'update_kategori_wisata'])->name('update-kategori-wisata');

    Route::delete('/hapus-kategori-wisata/{id}', [WisataController::class, 'hapus_kategori_wisata'])->name('hapus-kategori-wisata');

    Route::get('/wisata-category/{category}', [WisataController::class, 'showByCategory'])->name('wisata-category');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/submit-comment', [CommentController::class, 'submitComment'])->name('submit-comment');

    Route::delete('/hapus-komentar/{id}', [CommentController::class, 'destroy'])->name('hapus-komentar');

    Route::get('/profile-user', [UserController::class, 'profile'])->name('profile-user');

    Route::get('/edit-user', [UserController::class, 'edit'])->name('edit-user');

    Route::post('/update-user', [UserController::class, 'update'])->name('update-user');
});
