<?php

namespace App\Http\Controllers;
use App\Wisatas;

class IndexController extends Controller
{
    public function index()
    {
        $wisata = Wisatas::query()->orderBy('nama_tempat', 'asc')->limit(5)->get();
        return view('index', compact('wisata'));
    }
}