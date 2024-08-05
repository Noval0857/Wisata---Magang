<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function show_data_user()
    {
        $users = User::all();
        return view('admin.data-user.data-user', compact('users'));
    }

    public function profile()
    {
        $user = Auth::user();
        // $user = User::firstOrCreate(['user_id']);
        return view('user.profile-user', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        // $user = User::firstOrCreate(['user_id']);
        return view('user.edit-user', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not authenticated');
        }
    
        // Debugging statement
        if (!$user instanceof User) {
            dd('Unexpected type:', get_class($user));
        }
        
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->tanggal_lahir = $request->tanggal_lahir;
    
        if ($request->hasFile('foto_profil')) {
            $fileName = time().'.'.$request->foto_profil->extension();  
            $request->foto_profil->move(public_path('uploads'), $fileName);
            $user->foto_profil = $fileName;
        }
    
        $user->save();
    
        return redirect()->route('profile-user')->with('success', 'Profile updated successfully');
    }

    public function showLinkRequestForm()
    {
        return view('user.lupa-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $token = Str::random(60);
        $user->password_reset_token = $token;
        $user->password_reset_token_created_at = now();
        $user->save();

        // Kirim email dengan token reset password
        Mail::send('user.password-reset', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('status', 'Kami telah mengirimkan email dengan link reset password Anda!');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('user.reset-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::where('email', $request->email)
            ->where('password_reset_token', $request->token)
            ->first();

        if (!$user || now()->diffInMinutes($user->password_reset_token_created_at) > 60) {
            return back()->withErrors(['email' => 'Token reset password tidak valid atau telah kedaluwarsa.']);
        }

        $user->password = Hash::make($request->password);
        $user->password_reset_token = null;
        $user->password_reset_token_created_at = null;
        $user->save();

        return redirect()->route('login')->with('status', 'Password Anda telah direset!');
    }

}

