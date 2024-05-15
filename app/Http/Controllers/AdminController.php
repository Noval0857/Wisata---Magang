<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data kuliner dari database atau sumber lain (opsional)
        $admin = []; // Ganti dengan logika pengambilan data Anda

        return view('admin.admin', compact('admin'));
    }
}