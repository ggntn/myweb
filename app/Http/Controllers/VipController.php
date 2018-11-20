<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VipController extends Controller
{
    public function edit($id)
    {
//        if(auth()->user()->role_id != 1){
//            return redirect('/manga')->with('error','Unauthorized Page');
//
//        }
//
//        $mangas = Manga::findorfail($id);
////        $categories = Category::findorfail($id);
//
//
////          $chapters = Chap::findorfail($id);
//        return view('mangas.edit' )->with('mangas',$mangas);
////                                        ->with('chapters',$chapters)
////                                        ->with('categories',$categories)

    }

    public function index()
    {
//        $mangas= Manga::all();
//        $mangas= Manga::orderBy('manga_name','asc')->get();
        $users= User::all();



        return view('mangas.vip' )->with('users',$users);

    }
    public function update(Request $request, $id)
    {
        $users =  User::find($id);

        $users->role_id = $request->input('value');
        $users->save();
        return redirect('/manga')->with('success', 'Manga update');
    }
}
