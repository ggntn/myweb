<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index()
    {
        return view('mangas.create');
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        Manga::create($request->all());
        return redirect('manga');
    }
}
