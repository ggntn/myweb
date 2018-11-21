<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    public function store(Request $request)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }
        $this->validate($request,array('name'=>'required|max:255'));
        $tag = new Tag;
        $tag->name =$request->name;
        $tag->save();

        return redirect('/tags')->with('success', 'Tag create');

    }


}