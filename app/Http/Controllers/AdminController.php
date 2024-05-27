<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Wisata::all();
        return view('admin.admin', compact('admin'));
    }
}