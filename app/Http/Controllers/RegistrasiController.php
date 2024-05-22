<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    // UNTUK MENAMPUNG / MENYIMPAN DATA REGISTRASI USER
    public function simpanregistrasi(Request $request) {
        // digunakan untuk mencek data masuk atau tidak kedalam controller
        // dd($request->all());

        User::create([
            'level' => 'umum',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('login')->with('success', 'Data Berhasil Disimpan!');
    }
}
