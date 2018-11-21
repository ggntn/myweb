<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }
        $authors = Author::all();
        return view('authors.index')->with('authors',$authors);
    }

    public function store(Request $request)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }

        $this->validate($request, [
            'author_name'=>'required',
        ]);
            //create manga
        $authors = new Author;
        $authors->author_name = $request->input('author_name');
        $authors->save();

        return redirect('/author')->with('success', 'Author create');
    }

}
