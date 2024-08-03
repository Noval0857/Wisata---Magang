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
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
        ]);

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
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $request->session()->put('email', $request->email);
        $verification_code = rand(100000, 999999);
        $request->session()->put('verification_code', $verification_code);

        try {
            Mail::send('Login.verification-code', ['code' => $verification_code], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Verification Code');
            });
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send verification code. Please try again.']);
        }

        return redirect('register-step-3');
    }

    public function showStep3Form()
    {
        return view('Login.register-step-3');
    }

    public function postStep3Form(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric',
        ]);

        if ($request->verification_code != $request->session()->get('verification_code')) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        return redirect('register-step-4');
    }

    public function showStep4Form()
    {
        return view('Login.register-step-4');
    }

    public function postStep4Form(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->nama_lengkap = $request->session()->get('nama_lengkap');
        $user->tanggal_lahir = $request->session()->get('tanggal_lahir');
        $user->telepon = $request->session()->get('telepon');
        $user->email = $request->session()->get('email');
        $user->role = 'umum';
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->forget(['nama_lengkap', 'tanggal_lahir', 'telepon', 'email', 'verification_code']);

        return redirect('login')->with('success', 'Account created successfully. Please login.');
    }
}
