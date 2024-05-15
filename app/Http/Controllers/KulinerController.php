<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KulinerController extends Controller
{
    public function index()
    {
        // Ambil data kuliner dari database atau sumber lain (opsional)
        $dataKuliner = []; // Ganti dengan logika pengambilan data Anda

        return view('kuliner.data_kuliner', compact('dataKuliner'));
    }
}