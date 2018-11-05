<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('mangas.page');
    }


    public function __construct(){
        $this->middleware('auth');
    }
}
