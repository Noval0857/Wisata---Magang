<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class LoginController extends Controller
{
    // CEK DATA MASUK ATAU TIDAK
    // public function postlogin(Request $request){
    //     dd($request->all());
    // }

    // CEK LOGIN, DISESUAIKAN DENGAN DATA YANG ADA DIDATABASE
    public function postlogin(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'Login Berhasil!');
        }
        return redirect('login')->with('warning', 'Gagal Login!');
    }

//     public function postlogin(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials, $request->filled('remember'))) {
//         $request->session()->regenerate();

//         return redirect('/home')->with('success', 'Login Berhasil!');;
//     }

//     return back()->withErrors([
//         'email' => 'The provided credentials do not match our records.',
//     ]);
// }


    // LOGOUT
    public function logout(Request $request) {
        Auth::logout();
        
        return redirect('login')->with('success', 'Berhasil Logout');
        
    }

    // CHECK AUTH USER, JIKA USER  LOGIN DAN INGIN KEMBALI KE URL LOGIN MAKA AKAN DI PINDAH KE URL INDEX
    public function login() {
        if (Auth::check()) {
        return redirect('/home')->with('error', 'Not Found!');
        }
        return view('Login.login')->with('error', 'Not Found!');
    }

    // CHECK AUTH USER, JIKA USER  LOGIN DAN INGIN KEMBALI KE URL REGISTRASI MAKA AKAN DI PINDAH KE URL INDEX
    public function registrasi() {
        if (Auth::check()) {
        return redirect('/')->with('error', 'Not Found!');
        }
        return view('Login.registrasi')->with('error', 'Not Found!');
    }

    
}
