<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Category as ModelsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\FotoWisata;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{

    // tampilkan data
    // public function index()
    // {
    //     $wisatas = Wisata::with("fotoWisata", "category")->get();
    //     return view('admin.data-wisata.data-wisata', compact('wisatas'));
    // }


    public function show()
    {
        $wisatas = Wisata::all();
        return view('admin.data-wisata.data-wisata', compact('wisatas'));
    }

    public function home()
    {
        $wisatas = Wisata::with('comments.user.profile')->get();

        return view('index', compact('wisatas'));
    }

    public function viewTambah()
    {
        $kategoris = Category::all(); // Mengambil semua kategori

        return view('admin.data-wisata.tambah-data-wisata', compact('kategoris'));
    }

    public function detail($nama_wisata)
    {
        $wisatas = Wisata::where('nama_wisata', str_replace('-', ' ', $nama_wisata))->firstOrFail();
        // $wisatas = Wisata::findOrFail($id);
        $comments = $wisatas->comments()->where('approved', true)->with('user')->get();
        return view('wisata.wisata-detail', compact('wisatas', 'comments'));
    }

    // tambah data
    public function simpandata(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'google_maps_url' => 'required|url',
            'category_id' => 'required|integer|exists:categories,id'  // Validasi untuk category_id
        ]);

        // Create a new Wisata record
        $wisata = Wisata::create([
            'nama_wisata' => $request->input('nama_wisata'),
            'deskripsi' => $request->input('deskripsi'),
            'alamat' => $request->input('alamat'),
            'google_maps_url' => $request->input('google_maps_url'),
            'category_id' => $request->input('category_id'),  // Menyediakan nilai category_id
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
                'wisata_id' => $wisata->id,
                'nama_foto_wisata' => $fotoName,
                'path' => $path,
            ]);
        }

        // Redirect back to the admin page with a success message
        return redirect('admin')->with('success', 'Data wisata berhasil ditambahkan.');
    }


    public function ubahdata($id)
    {
        $wisatas = Wisata::findOrFail($id);
        $kategoris = Category::all(); // Fetch all categories from the database
        return view('admin.data-wisata.ubah-data-wisata', compact('wisatas', 'kategoris'));
    }

    public function updatedata(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        // Validate the input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
            'google_maps_url' => 'required|url',
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
        ]);

        // Update the record
        $wisata->update([
            'nama_wisata' => $request->input('nama_wisata'),
            'deskripsi' => $request->input('deskripsi'),
            'alamat' => $request->input('alamat'),
            'google_maps_url' => $request->input('google_maps_url'),
            'category_id' => $request->input('category_id') // Update the category
        ]);

        if ($request->hasFile('foto')) {
            // Find the existing photo record
            $fotoWisata = FotoWisata::where('wisata_id', $wisata->id)->first();

            // Delete the old photo if it exists
            if ($fotoWisata && file_exists(public_path($fotoWisata->path))) {
                unlink(public_path($fotoWisata->path));
            }

            // Store the new photo
            $foto = $request->file('foto');
            $destinationPath = public_path('fotos');
            $fotoName = time() . '-' . $foto->hashName();
            $foto->move($destinationPath, $fotoName);
            $path = 'fotos/' . $fotoName;

            // Update or create the photo record
            FotoWisata::updateOrCreate(
                ['wisata_id' => $wisata->id],
                [
                    'nama_foto_wisata' => $fotoName,
                    'path' => $path,
                ]
            );
        }

        return redirect('admin')->with('success', 'Wisata updated successfully.');
    }



    // hapus data
    public function hapusdata($id)
    {
        $wisatas = Wisata::findOrFail($id);
        $wisatas->delete();
        return back()->with('success', 'Delete Successfully!');
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

    // tampilkan foto wisata
    public function tampil_foto_wisata()
    {
        $foto_wisata = Wisata::with("fotoWisata")->get();
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
        $foto_wisata = FotoWisata::findOrfail($id);
        return view('admin.data-wisata.ubah-foto-wisata', compact('foto_wisata'));
    }

    public function ubah_foto_wisata(Request $request, $id)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
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

    public function kategori_wisata()
    {
        $kategoris = Category::all();
        return view('admin.data-kategori.data-kategori', compact('kategoris'));
    }

    public function view_tambah_kategori_wisata()
    {
        return view('admin.data-kategori.tambah-data-kategori');
    }

    public function tambah_kategori_wisata(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Create a new Wisata record
        Category::create([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        // Redirect back to the admin page with a success message
        return redirect()->route('kategori-wisata')->with('success', 'Data kategori berhasil ditambahkan.');
    }

    //edit data kategori
    public function view_ubah_kategori_wisata($id)
    {
        $kategoris = Category::findOrfail($id);
        return view('admin.data-kategori.ubah-data-kategori', compact('kategoris'));
    }

    public function update_kategori_wisata(Request $request, $id)
    {
        $kategori = Category::findOrFail($id);

        // Validate the input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Update the category using the instance
        $kategori->update([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        return redirect()->route('kategori-wisata')->with('success', 'Data kategori berhasil diupdate.');
    }

    public function hapus_kategori_wisata($id)
    {
        $kategoris = Category::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('kategori-wisata')->with('success', 'Data kategori berhasil didelete.');
    }

    public function showByCategory($nama_kategori)
    {
        // Mengambil data wisata berdasarkan kategori
        $wisatas = Wisata::whereHas('category', function ($query) use ($nama_kategori) {
            $query->where('nama_kategori', $nama_kategori);
        })
            ->get();

        // Kirim data ke view sesuai dengan kategori yang dipilih
        return view('wisata.wisata-category', compact('wisatas'));
    }
}
