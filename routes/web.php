<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kuliner;
use App\Http\Controllers\Admin;


Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');

Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Route::get('/data_kuliner', [KulinerController::class, 'index'])-> name('data_kuliner');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');



