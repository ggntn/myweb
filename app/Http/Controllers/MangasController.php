<?php

namespace App\Http\Controllers;
use App\Chap;
use App\Manga;
use App\Detail;
use Illuminate\Http\Request;

class MangasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $mangas= Manga::all();
//        $mangas= Manga::orderBy('manga_name','asc')->get();
        $mangas= Manga::orderBy('manga_name','desc')->paginate(10);
       return view('mangas.index' )->with('mangas',$mangas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // wait to fix chap
//        return Manga::find($id);
          $mangas = Manga::findorfail($id);
          $details = Detail::findorfail($id);
          $chapters = Chap::findorfail($id);
        return view('mangas.show' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters)
                                        ->with('details',$details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
