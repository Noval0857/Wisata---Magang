<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    // UNTUK MENYIMPAN DATA REGISTRASI USER
    public function simpanregistrasi(Request $request) {

        User::create([
            'role' => 'umum',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('login')->with('success', 'Data Berhasil Disimpan!');
    }
}
