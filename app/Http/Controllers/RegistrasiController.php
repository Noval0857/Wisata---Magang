<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegistrasiController extends Controller
{
    // UNTUK MENYIMPAN DATA REGISTRASI USER
    // public function simpanregistrasi(Request $request) {

    //     User::create([
    //         'role' => 'umum',
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'remember_token' => Str::random(60),
    //     ]);

    //     return redirect('login')->with('success', 'Data Berhasil Disimpan!');
    // }

    public function showStep1Form()
    {
        return view('Login.register-step-1');
    }

    public function postStep1Form(Request $request)
    {
        $request->session()->put('nama_lengkap', $request->nama_lengkap);
        $request->session()->put('tanggal_lahir', $request->tanggal_lahir);
        $request->session()->put('telepon', $request->telepon);
        return redirect('register-step-2');
    }

    public function showStep2Form()
    {
        return view('Login.register-step-2');
    }

    public function postStep2Form(Request $request)
    {
        $request->session()->put('email', $request->email);
        $verification_code = rand(100000, 999999);
        $request->session()->put('verification_code', $verification_code);

        Mail::send('Login.verification-code', ['code' => $verification_code], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verification Code');
        });

        return redirect('register-step-3');
    }

    public function showStep3Form()
    {
        return view('Login.register-step-3');
    }

    public function postStep3Form(Request $request)
    {
        if ($request->verification_code == $request->session()->get('verification_code')) {
            return redirect('register-step-4');
        } else {
            return redirect('register-step-3')->withErrors(['verification_code' => 'Invalid verification code.']);
        }
    }

    public function showStep4Form()
    {
        return view('Login.register-step-4');
    }

    public function postStep4Form(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->nama_lengkap = $request->session()->get('nama_lengkap');
        $user->tanggal_lahir = $request->session()->get('tanggal_lahir');
        $user->telepon = $request->session()->get('telepon');
        $user->email = $request->session()->get('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login')->with('success', 'Registration completed. You can now login.');
    }
}
