<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create() 
    {
        return view('createCategory');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|min:5',
        ]);
        $category = new Category();
        $category->judul_kategori = $request->kategori;
        $category->save();
        return redirect()->route('article.create');
    }
}