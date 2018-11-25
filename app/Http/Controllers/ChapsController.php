<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manga;
use App\Chap;
use Illuminate\Support\Facades\Storage;

class ChapsController extends Controller
{

    public function index()
    {


        $mangas = Manga::all();
        $chapters= Chap::orderBy('created_at','desc')->paginate(10);
        return view('mangas.chaphome' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters);
    }

    public function create()
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }
        $mangas= Manga::pluck('manga_name', 'chap_id');
        return view('mangas.create_chap')->with('mangas',$mangas);
    }

    public function store(Request $request)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }
        $this->validate($request, [

//
            'chapter_id'=>'required',
            'chap_name'=>'required',
            'image'=>'required',
            'image.*'=>'mimes:png,jpg,jpeg',

        ]);
        if($request->hasFile('image')){
            foreach ($request->file('image') as $image)
                     {
                        $filename = $image->getClientOriginalName();
                        $image->move('storage/imageschap',$filename);
                        $data[]=$filename;

                        }
                        dd($data);
        }else{
            $fileNametoStore = 'noimage.jpg';
        }
        //create Chap
        $chapters = new Chap;

        $chapters->chap_id = $request->input('chapter_id');
//
        $chapters->chap_name = $request->input('chap_name');
        $chapters->image = json_encode($data);
        $chapters->save();

        return redirect('/manga')->with('success', 'Chap create');
    }



    public function destroy($id)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }

        $chapters =  Chap::find($id);

        if($chapters->image!= 'noimage.jpg' ){
            //delete
            Storage::delete('public/imageschap/'.$chapters->image);
        }

        $chapters->delete();
        return redirect('/manga')->with('success', 'Chapter delete');
    }
    public function pass_value($value)
    {
        $data['ch'] = $value;
        $chapters = Chap::all();
        $mangas = Manga::all();

        return view('mangas.chap',$data)->with('chapters',$chapters)
                                            ->with('mangas',$mangas);

    }
    public function __construct(){
        $this->middleware('auth');
    }

}
