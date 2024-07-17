<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $wisataCount = Wisata::count();
        $categoryCount = Category::count();
        $commentCount = Comment::count();
    
        return view('admin.adminindex', compact('userCount', 'wisataCount', 'categoryCount', 'commentCount'));
    }
}