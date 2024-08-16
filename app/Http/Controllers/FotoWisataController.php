<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\FotoWisata;

class FotoWisataController extends Controller
{
        // tampilkan foto wisata
        public function tampil_foto_wisata()
        {
            $foto_wisata = FotoWisata::with(['wisata'])->get();
            return view('admin.data-wisata.foto-wisata', compact('foto_wisata'));
        }

        public function viewTambah_foto_wisata()
        {
            $foto_wisata = Wisata::all();
            return view('admin.data-wisata.tambah-foto-wisata', compact('foto_wisata'));
        }

            // tambah foto wisata
    public function simpan_foto_wisata(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
        ]);

        // Handle the file upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $destinationPath = public_path('fotos');
            $fotoName = time() . '-' . $foto->hashName();
            $foto->move($destinationPath, $fotoName);
            $path = 'fotos/' . $fotoName;

            // Create a new FotoWisata record
            FotoWisata::create([
                'wisata_id' => $request->input('wisata_id'),
                'nama_foto_wisata' => $fotoName,
                'path' => $path,
            ]);
        }

        // Redirect back to the admin page with a success message
        return redirect('admin')->with('success', 'Foto wisata berhasil ditambahkan.');
    }

    public function view_ubah_foto_wisata($id)
    {
        $foto_wisata = FotoWisata::with(['wisata'])->find($id);
    
        $wisata = Wisata::all();
    
        return view('admin.data-wisata.ubah-foto-wisata', compact('foto_wisata', 'wisata'));
    }

    public function ubah_foto_wisata(Request $request, $id)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto_wisata = FotoWisata::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
            $foto_wisata->path = 'fotos/' . $imageName;
        }

        $foto_wisata->wisata_id = $request->wisata_id;
        $foto_wisata->save();

        return redirect()->route('view-ubah-foto-wisata', $id)->with('success', 'Foto Wisata updated successfully!');
    }

    public function hapus_foto_wisata($id)
    {
        $foto_wisata = FotoWisata::findOrFail($id);
        $foto_wisata->delete();
        return redirect()->route('foto-wisata')->with('success', 'Data kategori berhasil didelete.');
    }
}
