<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

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
        return back()->with('success', 'Comment posted successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Hanya pengguna yang memiliki komentar atau admin yang dapat menghapus komentar
        if (Auth::id() !== $comment->user_id) {
            return back()->with('warning', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }


    public function approveComment($id)
    {
        $comment = Comment::find($id);
        $comment->approved = true;
        $comment->save();

        return back()->with('success', 'Comment approved successfully.');
    }
}
