<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class UserController extends Controller
{
    public function show_data_user()
    {
        $users = UserProfile::all();
        return view('admin.data-user.data-user', compact('users'));
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = UserProfile::firstOrCreate(['user_id' => $user->id]);
        return view('user.profile-user', compact('user', 'profile'));
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = UserProfile::firstOrCreate(['user_id' => $user->id]);
        return view('user.edit-user', compact('user', 'profile'));
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
        $profile = UserProfile::firstOrCreate(['user_id' => $user->id]);
        
        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->alamat = $request->alamat;
        $profile->telepon = $request->telepon;
        $profile->tanggal_lahir = $request->tanggal_lahir;

        if ($request->hasFile('foto_profil')) {
            $fileName = time().'.'.$request->foto_profil->extension();  
            $request->foto_profil->move(public_path('uploads'), $fileName);
            $profile->foto_profil = $fileName;
        }

        $profile->save();

        return redirect()->route('profile-user')->with('success', 'Profile updated successfully');
    }

}

