<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{

    public function index()
    {
        // Mengambil semua komentar beserta user dan wisata yang terkait
        $comments = Comment::with(['user', 'wisata'])->get();
        return view('admin.data-komentar.komentar-user', compact('comments'));
    }

    public function submitComment(Request $request)
    {
        // Validasi input
        $request->validate([
            'konten' => 'required|string|min:2|max:1020',
            'wisata_id' => 'required|exists:wisatas,id',
        ]);

        // Buat komentar baru
        Comment::create([
            'user_id' => Auth::id(),
            'wisata_id' => $request->input('wisata_id'),
            'konten' => $request->input('konten'),
            'approved' => false, // default tidak ter-approve
        ]);

        // Redirect dengan pesan sukses
        return back()->with('success', 'Komentar berhasil ditambahkan. Tunggu persetujuan admin untuk ditampilkan!');
    }

    public function hapus_komentar($id)
    {
        $comments = Comment::findOrFail($id);

        $comments->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }


    public function approveComment($id)
    {
        $comment = Comment::find($id);
        $comment->approved = true;
        $comment->save();

        return back()->with('success', 'Comment approved successfully.');
    }

    // Menampilkan formulir pengeditan komentar
    public function edit_komentar($id)
    {
        $comments = Comment::findOrFail($id);

        return view('admin.data-komentar.edit-komentar-user', compact('comments'));
    }

    // Menangani permintaan pembaruan komentar
    public function update_komentar(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'konten' => 'required|string|min:2|max:1020',
        ]);

        $comments = Comment::findOrFail($id);

        // Perbarui konten komentar
        $comments->konten = $request->input('konten');
        $comments->save();

        return back()->with('success', 'Comment updated successfully.');
    }
}
