<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        $wisatas = Wisata::all();
        return view('admin.tampil-data', compact('wisatas'));
    }

    // Store a newly created resource in storage.
    public function simpandata(Request $request)
    {
        Wisata::create([
            'nama_wisata'   => $request->nama_wisata,
            'deskripsi'     => $request->deskripsi,
            'alamat'        => $request->alamat,
        ]);

        return redirect('admin')->with('success', 'Wisata created successfully.');
    }

    //edit data wisata
    public function edit($id_wisata){
        $wisatas = Wisata::FindOrFail($id_wisata);
        return view('admin.edit-data', compact('wisatas'));
    }

    //simpan edit data wisata
    public function simpanEditWisata(Request $request, $id_wisata)
    {
        if($request->password){
            // DIGUNAKAN UNTUK EDIT DATA NAMA, EMAIL, DAN PASSWORD
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect ('data-pengguna')->with('success', 'Task Edited Successfully!');;
        }else
        if (!$request->password){
            // DIGUNAKAN UNTUK EDIT DATA NAMA DAN EMAIL SAJA
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect ('data-pengguna')->with('success', 'Task Edited Successfully!');
        }
    }
}
