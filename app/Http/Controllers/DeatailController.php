<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeatailController extends Controller
{
    public function index()
    {
        return view('mangas.detail');
    }

    public function __construct(){
        $this->middleware('auth');
    }
}
