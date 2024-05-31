<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\FotoWisata;

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

    public function viewTambah(){
        return view('admin.tambah-data');
    }

    // public function detail($id_wisata) {
    //     $wisatas = Wisata::findOrfail($id_wisata);
    //     return view('wisata.wisata-detail', compact('wisatas'));
    // }

    public function detail($nama_wisata){
        $wisatas = Wisata::where('nama_wisata', str_replace('-', ' ', $nama_wisata))->firstOrFail();
        return view('wisata.wisata-detail', compact('wisatas'));
    }

    // public function detail(){
    //     $wisatas = Wisata::all();
    //     return view('wisata.wisata-detail', compact('wisatas'));
    // }


    // tambah data
    public function simpandata(Request $request)
    {

        // Validasi data
    $request->validate([
        'nama_wisata' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'alamat' => 'required|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
        'google_maps_url' => 'required|url',
    ]);

    // Simpan data wisata ke database
    $wisatas = Wisata::create([
        'nama_wisata' => $request->input('nama_wisata'),
        'deskripsi' => $request->input('deskripsi'),
        'alamat' => $request->input('alamat'),
        'google_maps_url' => $request->input('google_maps_url'),
    ]);

    // Simpan file foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $path = $foto->store('public/fotos');

        FotoWisata::create([
            'id_wisata' => $wisatas->id_wisata,
            'nama_foto_wisata' => $foto->getClientOriginalName(), // Nama asli file
            'path' => $path,
        ]);
    }

    // Redirect ke halaman yang diinginkan
    return redirect('data-wisata')->with('success', 'Data wisata berhasil ditambahkan.');

        // Wisata::create([
        //     'nama_wisata'   => $request->nama_wisata,
        //     'deskripsi'     => $request->deskripsi,
        //     'alamat'        => $request->alamat,
        // ]);

        // return redirect('data-wisata')->with('success', 'Wisata created successfully.');
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
