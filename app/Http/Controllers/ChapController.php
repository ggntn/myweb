<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manga;
use App\Chap;

class ChapController extends Controller
{
    public function index()
    {

        $mangas = Manga::all();
        $chapters = Chap::all();

        return view('mangas.chap' )->with('mangas',$mangas)
                                            ->with('chapters',$chapters);
    }
}
