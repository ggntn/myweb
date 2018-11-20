<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manga;
use App\Chap;
use Illuminate\Support\Facades\Storage;

class ChapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mangas = Manga::all();
        $chapters= Chap::orderBy('chap_name','desc')->paginate(10);
        return view('mangas.home' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }

        return view('mangas.create_chap');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }

        $this->validate($request, [

//
            'chap_id'=>'required',
            'chap_name'=>'required',
            'image'=>'required',
//            'image.*'=>'mimes:png,jpg,jpeg|max:99999',

        ]);
        if($request->hasFile('image')){
            foreach ($request->file('image') as $image)
                     {
//                         //get filename with the extension
//                            $filenameWithExt = $image->getClientOriginalName();
//                        //get just filename
//                             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//                        //get just ext
//                                $extension = $image->getClientOriginalExtension();
//                        //Filename to store
//                             $fileNametoStore = $filename . '_' . time() . '.' . $extension;
//                             Storage::put('public/imageschap'.$fileNametoStore, fopen($image,'r+'));
//                        //upload image
//                            $path = $request = $image->storeAs('public/imageschap', $fileNametoStore);

                        $filename = $image->getClientOriginalName();
                        $image->move('storage/imageschap',$filename);
                        $data[]=$filename;

                        }


        }else{
            $fileNametoStore = 'noimage.jpg';
        }
        //create Chap
        $chapters = new Chap;

        $chapters->chap_id = $request->input('chap_id');
//
        $chapters->chap_name = $request->input('chap_name');
        $chapters->image = json_encode($data);
        $chapters->save();

        return redirect('/manga')->with('success', 'Chap create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $chapters = Chap::findorfail($id);
//        return view('mangas.chap' )->with('chapters',$chapters)

                                                                    ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $mangas = Manga::findorfail($id);
//        $chapters = Chap::findorfail($id);
//
//        return view('mangas.edit_chap' )
//                                        ->with('chapters',$chapters);

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
//        $this->validate($request, [
//
//            'chap_id'=>'required',
//            'chap_name'=>'required',
//            'image'=>'required',
//
//        ]);
//        //create Chap
//        $chapters =  Chap::findorFail($id);
//
//        $chapters->chap_id = $request->input('chap_id');
//        $chapters->chap_name = $request->input('chap_name');
//        $chapters->image = $request->input('image');
//
//
//        $chapters->save();
//
//        return redirect('/manga')->with('success', 'Chap edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }

        $chapters =  Chap::findorfail($name);
        if($chapters->chap_name == $name){
            if($chapters->image!= 'noimage.jpg' ){
                //delete
                Storage::delete('public/imageschap/'.$chapters->image);

            }
            $chapters->delete();
            return redirect('/manga')->with('success', 'Chapter delete');
        }
        else{
            return redirect('/manga')->with('fail', 'Chapter cant delete');
        }
//        if($chapters->image!= 'noimage.jpg' ){
//            //delete
//            Storage::delete('public/imageschap/'.$chapters->image);
//        }
//
//        $chapters->delete();

//        return redirect('/manga')->with('success', 'Chapter delete');
    }
    public function pass_value($value)
    {
//        $categories = Category::findorfail($id);
//        return view('mangas.category' )->with('categories',$categories);
        $data['ch'] = $value;
        $chapters = Chap::all();
        $mangas = Manga::all();
//        $categories = Category::all();
        return view('mangas.chap',$data)->with('chapters',$chapters)
                                            ->with('mangas',$mangas);

//
    }
    public function __construct(){
        $this->middleware('auth',['except'=>
            ['index']]);
    }
}
