<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\FotoWisata;
use App\Models\Comment;

class WisataController extends Controller
{

    // tampilkan data
    public function index()
    {
        $wisatas = Wisata::with("fotoWisata")->get();
        return view('admin.tampil-data', compact('wisatas'));
    }

    public function show()
    {
        $wisatas = Wisata::all();
        return view('admin.dashboard', compact('wisatas'));
    }

    public function home()
    {
        $wisatas = Wisata::all();
        return view('index', compact('wisatas'));
    }

    public function viewTambah()
    {
        return view('admin.tambah-data');
    }

    // public function detail($id_wisata) {
    //     $wisatas = Wisata::findOrfail($id_wisata);
    //     return view('wisata.wisata-detail', compact('wisatas'));
    // }

    public function detail($nama_wisata)
    {
        $wisatas = Wisata::where('nama_wisata', str_replace('-', ' ', $nama_wisata))->firstOrFail();
        // $wisatas = Wisata::findOrFail($id);
        $comments = $wisatas->comments()->where('approved', true)->with('user')->get();
        return view('wisata.wisata-detail', compact('wisatas', 'comments'));
        
    }


    // public function detail(){
    //     $wisatas = Wisata::all();
    //     return view('wisata.wisata-detail', compact('wisatas'));
    // }


    // tambah data
    public function simpandata(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'google_maps_url' => 'required|url',
        ]);

        $wisata = Wisata::create([
            'nama_wisata' => $request->input('nama_wisata'),
            'deskripsi' => $request->input('deskripsi'),
            'alamat' => $request->input('alamat'),
            'google_maps_url' => $request->input('google_maps_url'),
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('public/fotos');


            FotoWisata::create([
                'wisata_id' => $wisata->id,
                'nama_foto_wisata' => $foto->hashName(),
                'path' => $path,
            ]);
        }

        return redirect('data-wisata')->with('success', 'Data wisata berhasil ditambahkan.');
    }

    //edit data wisata
    public function ubahdata($id)
    {
        // $wisatas = Wisata::where('id_wisata', $id_wisata);
        $wisatas = Wisata::findOrfail($id);
        return view('admin.ubah-data-wisata', compact('wisatas'));
    }

    //simpan edit data wisata
    public function updatedata(Request $request, $id)
    {
        $wisatas = Wisata::where('id', $id)->firstOrFail();
        $wisatas->update([
            'nama_wisata'       => $request->nama_wisata,
            'deskripsi'         => $request->deskripsi,
            'alamat'            => $request->alamat,
            'foto'              => $request->foto,
            'google_maps_url'   => $request->google_maps_url,
        ]);

        return redirect('data-wisata')->with('success', 'Wisata updated successfully.');
    }

    // hapus data
    public function hapusdata($id)
    {
        $wisatas = Wisata::findOrFail($id);
        $wisatas->delete();
        return back()->with('success', 'Delete Successfully!');;
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:1020',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'wisata_id' => $id,
            'text' => $request->input('text'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
