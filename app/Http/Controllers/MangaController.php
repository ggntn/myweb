<?php

namespace App\Http\Controllers;

use App\Manga;
use Illuminate\Http\Request;


class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::get();
        return view('mangas.home', compact('mangas'));
    }

    public function create(){
        return view('mangas.create');
    }

    public function store(Request $request){
        Manga::create($request->all());
        return redirect('manga');
//        $this->validate($request,[
//            'title'=>'required',
//            'body'=> 'required'
//        ]);
//        return 123;
    }

    public function show($id){
        $mangas = Manga::find($id);
        if(empty($mangas))
            abort(404);
        return view('mangas.show', compact('mangas'));
    }
}
