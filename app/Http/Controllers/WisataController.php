<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{

    // tampilkan data
    public function index()
    {
        $wisatas = Wisata::all();
        return view('admin.tampil-data', compact('wisatas'));
    }

    public function show()
    {
        $wisatas = Wisata::all();
        return view('admin.admin', compact('wisatas'));
    }

    public function home()
    {
        $wisatas = Wisata::all();
        return view('index', compact('wisatas'));
    }



    // tambah data
    public function simpandata(Request $request)
    {
        Wisata::create([
            'nama_wisata'   => $request->nama_wisata,
            'deskripsi'     => $request->deskripsi,
            'alamat'        => $request->alamat,
        ]);

        return redirect('data-wisata')->with('success', 'Wisata created successfully.');
    }

    //edit data wisata
    public function ubahdata($id_wisata){
        // $wisatas = Wisata::where('id_wisata', $id_wisata);
        $wisatas = Wisata::findOrfail($id_wisata);
        return view('admin.ubah-data-wisata', compact('wisatas'));
    }

    //simpan edit data wisata
    public function updatedata(Request $request, $id_wisata)
    {
        $wisatas = Wisata::where('id_wisata', $id_wisata)->firstOrFail();
        $wisatas->update([
            'nama_wisata'   => $request->nama_wisata,
            'deskripsi'     => $request->deskripsi,
            'alamat'        => $request->alamat,
        ]);
    
        return redirect('data-wisata')->with('success', 'Wisata updated successfully.');
    }

    // hapus data
    public function hapusdata($id_wisata)
    {
        $wisatas = Wisata::findOrFail($id_wisata);
        $wisatas->delete();
        return back()->with('success', 'Delete Successfully!');;
    }
}
