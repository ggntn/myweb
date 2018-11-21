<?php

namespace App\Http\Controllers;
use App\Author;
use App\Category;
use App\Chap;
use App\Manga;
use App\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $categories= Category::all();
        $mangas= Manga::orderBy('manga_name','desc')->paginate(10);


       return view('mangas.index' )->with('mangas',$mangas)
                                     ->with('categories',$categories);

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
        $tag_list = Tag::pluck('name', 'id');
//        $tags = Tag::all();
        return view('mangas.create', compact('tag_list'));
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
//        dd($request);
      $this->validate($request, [
         'manga_name'=>'required',
          'author_id'=>'required',
          'detail'=>'required',
          'chap_id'=>'required',
          'image'=>'image|nullable|max:1999',
          'category_id'=>'required',
          'tag_list'=>'required'

      ]);
      //file upload
        if($request->hasFile('image')){
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension =$request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNametoStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images',$fileNametoStore);

        }else{
            $fileNametoStore = 'noimage.jpg';
        }

      //create manga
      $mangas = new Manga;
      $mangas->manga_name = $request->input('manga_name');
      $mangas->detail = $request->input('detail');
      $mangas->author_id = $request->input('author_id');
      $mangas->chap_id = $request->input('chap_id');
      $mangas->image = $fileNametoStore;
      $mangas->category_id = $request->input('category_id');
      $mangas->save();

        $tagsId = $request->input('tag_list');
        if(!empty($tagsId))
            $mangas->tags()->sync($tagsId);

//        $tagsId = $request->input('tag_list');
//        if(!empty($tagsId))
//            $mangas->tags()->sync($tagsId);
//
      return redirect('/manga')->with('success', 'Manga create');

    }


//

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

          $mangas = Manga::findorfail($id);
          $categories = Category::all();
        $chapters= Chap::orderBy('chap_name','desc')->paginate(10);
        $tags = Tag::all();
//

        return view('mangas.show' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters)
                                        ->with('categories',$categories)
                                        ->with('tags',$tags)
                                        ;

    }

    public function edit($id)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }

        $mangas = Manga::findorfail($id);
        $tag_list = Tag::pluck('name', 'id');

        return view('mangas.edit' )->with('mangas',$mangas)
                                         ->with('tag_list',$tag_list);
    }


    public function update(Request $request, $id)
    {
        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');
        }


        $this->validate($request, [
            'manga_name'=>'required',
            'author_id'=>'required',
            'detail'=>'required',
            'chap_id'=>'required',
            'image'=>'image|nullable|max:1999',
            'category_id'=>'required',
            'tag_list'=>'required'
        ]);

        if($request->hasFile('image')){
            if($request->input('old_image')!='noimage.jpg'){
                Storage::delete('public/images/'.$request->old_image);
            }
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension =$request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNametoStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images',$fileNametoStore);

        }
        //edit manga
        $mangas =  Manga::find($id);
        $mangas->manga_name = $request->input('manga_name');
        $mangas->author_id = $request->input('author_id');
        $mangas->chap_id = $request->input('chap_id');
        if($request->has('image')){
            $mangas->image = $fileNametoStore;
        }
        $mangas->category_id = $request->input('category_id');
        $mangas->detail = $request->input('detail');
        $mangas->save();

        $tagsId = $request->input('tag_list');
        if(!empty($tagsId))
            $mangas->tags()->sync($tagsId);
        else
            $mangas->tags()->detach();

        return redirect('/manga')->with('success', 'Manga update');
    }

    public function destroy($id)
    {

        if(auth()->user()->role_id != 1){
            return redirect('/manga')->with('error','Unauthorized Page');

        }
        $mangas =  Manga::find($id);

        if($mangas->image!= 'noimage.jpg' ){
            //delete
            Storage::delete('public/images/'.$mangas->image);
        }

        $mangas->delete();
        return redirect('/manga')->with('success', 'Manga delete');
    }


    public function __construct(){
        $this->middleware('auth',['except'=>
                                                ['index']]);
    }
}
