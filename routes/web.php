<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\WisataController;


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', [WisataController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');

Route::post('/simpanregistrasi', [RegistrasiController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Route::get('/data_kuliner', [KulinerController::class, 'index'])->name('data_kuliner');

Route::get('/detail-wisata/{nama_wisata}', [WisataController::class, 'detail'])->name('detail-wisata');

// Protected routes (requires authentication)
Route::group(['middleware' => ['auth']], function() {

    Route::get('/admin', [WisataController::class, 'show'])->middleware('admin');

    Route::get('/tambah-data', [WisataController::class, 'viewTambah'])->middleware('admin');

    Route::get('/data-wisata', [WisataController::class, 'index'])->middleware('admin');

    Route::post('/simpan-data', [WisataController::class, 'simpandata'])->middleware('admin');

    Route::get('/ubah-data-wisata/{id_wisata}', [WisataController::class, 'ubahdata'])->middleware('admin');

    Route::post('/simpan-data-wisata/{id_wisata}', [WisataController::class, 'updatedata'])->middleware('admin');

    Route::delete('/hapus-data-wisata/{id_wisata}', [WisataController::class, 'hapusdata'])->middleware('admin'); 
});
