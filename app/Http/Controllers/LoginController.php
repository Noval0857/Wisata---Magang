<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class LoginController extends Controller
{

    // CEK LOGIN, DISESUAIKAN DENGAN DATA YANG ADA DIDATABASE
    public function postlogin(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika ada parameter 'redirect' dalam request, redirect ke URL tersebut
            $redirectTo = $request->input('redirect', '/');
            return redirect()->to($redirectTo)->with('success', 'Login Berhasil!');
        }
    
        return redirect()->route('login')->with('warning', 'Gagal Login!');
    }

    // LOGOUT
    public function logout() {
        Auth::logout();
        
        return redirect()->route('login')->with('success', 'Berhasil Logout');
        
    }

    // CHECK AUTH USER, JIKA USER  LOGIN DAN INGIN KEMBALI KE URL LOGIN MAKA AKAN DI PINDAH KE URL INDEX
    public function login(Request $request) {
        if (Auth::check()) {
            return redirect('/')->with('error', 'Not Found!');
        }
    
        // Cek apakah ada parameter 'redirect' dalam request
        $redirectTo = $request->query('redirect');
    
        return view('Login.login', ['redirect' => $redirectTo])->with('error', 'Not Found!');
    }

    // CHECK AUTH USER, JIKA USER  LOGIN DAN INGIN KEMBALI KE URL REGISTRASI MAKA AKAN DI PINDAH KE URL INDEX
    public function registrasi() {
        if (Auth::check()) {
        return redirect('/')->with('error', 'Not Found!');
        }
        return view('Login.register-step-1')->with('error', 'Not Found!');
    }

    
}
