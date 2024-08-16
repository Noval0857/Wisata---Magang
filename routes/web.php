<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\FotoWisataController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;

// Route::get('send-test-email', function () {
//     Mail::raw('This is a test email.', function ($message) {
//         $message->to('utuhujay@gmail.com')
//                 ->subject('Test Email');
//     });

//     return 'Email sent successfully!';
// });

Route::get('/', [WisataController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::get('/registrasi-user', [RegistrasiController::class, 'regis-user'])->name('registrasi-user');
Route::get('/registrasi-email', [LoginController::class, 'regis-email'])->name('registrasi-email');


Route::get('register-step-1', [RegistrasiController::class, 'showStep1Form']);
Route::post('register-step-1', [RegistrasiController::class, 'postStep1Form']);

Route::get('register-step-2', [RegistrasiController::class, 'showStep2Form']);
Route::post('register-step-2', [RegistrasiController::class, 'postStep2Form']);

Route::get('register-step-3', [RegistrasiController::class, 'showStep3Form']);
Route::post('register-step-3', [RegistrasiController::class, 'postStep3Form']);

Route::get('register-step-4', [RegistrasiController::class, 'showStep4Form']);
Route::post('register-step-4', [RegistrasiController::class, 'postStep4Form']);

// Route untuk form lupa password
Route::get('lupa-password', [UserController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('send-reset-link', [UserController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk form reset password
Route::get('reset-password/{token}/{email}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [UserController::class, 'reset'])->name('password.update');




Route::post('/simpanregistrasi', [RegistrasiController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Route::get('/detail-wisata/{nama_wisata}', [WisataController::class, 'detail'])->name('detail-wisata');

Route::get('/wisata-category/{nama_kategori}', [WisataController::class, 'showByCategory'])->name('wisata-category');

// Protected routes (requires authentication)
Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Wisata

    Route::get('/tambah-data-wisata', [WisataController::class, 'viewTambah'])->name('tambah-data-wisata');

    Route::get('/data-wisata', [WisataController::class, 'show'])->name('data-wisata');

    Route::post('/simpan-data', [WisataController::class, 'simpandata'])->name('simpan-data');

    Route::get('/ubah-data-wisata/{id}', [WisataController::class, 'ubahdata'])->name('ubah-data-wisata');

    Route::post('/simpan-data-wisata/{id}', [WisataController::class, 'updatedata'])->name('simpan-data-wisata');

    Route::delete('/hapus-data-wisata/{id}', [WisataController::class, 'hapusdata'])->name('hapus-data-wisata');

    // Komentar

    Route::get('/komentar', [CommentController::class, 'index'])->name('komentar');

    Route::post('/komentar/approve/{id}', [CommentController::class, 'approveComment'])->name('approve-komentar');

    Route::get('/edit-komentar-user/{id}', [CommentController::class, 'edit_komentar'])->name('edit-komentar-user');

    Route::post('/update-komentar-user/{id}', [CommentController::class, 'update_komentar'])->name('update-komentar-user');

    Route::delete('/hapus-komentar-user/{id}', [CommentController::class, 'hapus_komentar'])->name('hapus-komentar-user');

    // Foto Wisata

    Route::get('/foto-wisata', [FotoWisataController::class, 'tampil_foto_wisata'])->name('foto-wisata');

    Route::get('/tambah-foto-wisata', [FotoWisataController::class, 'viewTambah_foto_wisata'])->name('tambah-foto-wisata');

    Route::post('/simpan-foto-wisata', [FotoWisataController::class, 'simpan_foto_wisata'])->name('simpan-foto-wisata');

    Route::get('/view-ubah-foto-wisata/{id}', [FotoWisataController::class, 'view_ubah_foto_wisata'])->name('view-ubah-foto-wisata');

    Route::post('/ubah-foto-wisata/{id}', [FotoWisataController::class, 'ubah_foto_wisata'])->name('ubah-foto-wisata');

    Route::delete('/hapus-foto-wisata/{id}', [FotoWisataController::class, 'hapus_foto_wisata'])->name('hapus-foto-wisata');

    // Kategori

    Route::get('/kategori-wisata', [WisataController::class, 'kategori_wisata'])->name('kategori-wisata');

    Route::get('/view-tambah-kategori-wisata', [WisataController::class, 'view_tambah_kategori_wisata'])->name('view-tambah-kategori-wisata');

    Route::post('/tambah-kategori-wisata', [WisataController::class, 'tambah_kategori_wisata'])->name('tambah-kategori-wisata');

    Route::get('/view-edit-kategori-wisata/{id}', [WisataController::class, 'view_ubah_kategori_wisata'])->name('view-edit-kategori-wisata');

    Route::post('/update-kategori-wisata/{id}', [WisataController::class, 'update_kategori_wisata'])->name('update-kategori-wisata');

    Route::delete('/hapus-kategori-wisata/{id}', [WisataController::class, 'hapus_kategori_wisata'])->name('hapus-kategori-wisata');

    // User

    Route::get('/data-user', [UserController::class, 'show_data_user'])->name('show-data-user');

});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/submit-comment', [CommentController::class, 'submitComment'])->name('submit-comment');

    Route::delete('/hapus-komentar/{id}', [CommentController::class, 'destroy'])->name('hapus-komentar');

    Route::get('/profile-user', [UserController::class, 'profile'])->name('profile-user');

    Route::get('/edit-user', [UserController::class, 'edit'])->name('edit-user');

    Route::post('/update-user', [UserController::class, 'update'])->name('update-user');
    
});
