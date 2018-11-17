<?php

namespace App\Http\Controllers;
use App\Author;
use App\Category;
use App\Chap;
use App\Manga;

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

        return view('mangas.create');
    }
//
//    public function create_chap()
//    {
////        $categories= Category::all();
//        return view('mangas.create_chap');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
         'manga_name'=>'required',
          'author_id'=>'required',
          'detail'=>'required',
          'chap_id'=>'required',
          'image'=>'image|nullable|max:1999',
          'category_id'=>'required'
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

//      save category
//      $categories = new Category;
//      $categories->category_id = $request->input('category_id');
//      $categories->category_name= $request->input('category');
//      $categories->save();
//
//        $authors = new Author;
//        $authors->author_id = $request->input('author_id');
//        $authors->author_name = $request->input('author');
//        $authors->save();
//
//        $details = new Detail;
//        $details->detail_id = $request->input('detail_id');
//        $details->detail_name = $request->input('detail');
//        $details->save();
//
//        $titles = new Title;
//        $titles->title_id = $request->input('title_id');
//        $titles->title_name = $request->input('title');
//        $titles->save();
//
//        $chapters = new Chap;
//        $chapters->chap_id = $request->input('chap_id');
//        $chapters->save();



      return redirect('/manga')->with('success', 'Manga create');

    }


//    public function store_chaps(Request $request)
//    {
//        $this->validate($request, [
//
//            'chap_id'=>'required',
//            'chap_name'=>'required',
//            'image'=>'required',
//
//        ]);
//        //create Chap
//        $chapters = new Chap;
//
//        $chapters->chap_id = $request->input('chap_id');
//        $chapters->chap_name = $request->input('chap_name');
//        $chapters->image = $request->input('image');
//
//
//        $chapters->save();
//
//        return redirect('/manga')->with('success', 'Chap create');
//
//    }

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
          $categories = Category::all();
        $chapters= Chap::orderBy('chap_name','desc')->paginate(10);
//        $categories = Category::findorfail($id);



//          $chapters = Chap::findorfail($id);
        return view('mangas.show' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters)
                                        ->with('categories',$categories)
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
        $mangas = Manga::findorfail($id);
//        $categories = Category::findorfail($id);


//          $chapters = Chap::findorfail($id);
        return view('mangas.edit' )->with('mangas',$mangas);
//                                        ->with('chapters',$chapters)
//                                        ->with('categories',$categories)

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
        $this->validate($request, [
            'manga_name'=>'required',
            'author_id'=>'required',
            'detail'=>'required',
            'chap_id'=>'required',
            'image'=>'image|nullable|max:1999',
            'category_id'=>'required'
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
        return redirect('/manga')->with('success', 'Manga update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mangas =  Manga::find($id);

        if($mangas->image!= 'noimage.jpg' ){
            //delete
            Storage::delete('public/images/'.$mangas->image);
        }

        $mangas->delete();
        return redirect('/manga')->with('success', 'Manga delete');
    }

//    public function editchap($id)
//    {
//        $mangas = Manga::findorfail($id);
//        $chapters = Chap::findorfail($id);
//
//        return view('mangas.edit_chap' )->with('mangas',$mangas)
//            ->with('chapters',$chapters);
//
//    }
//    public function updatechap(Request $request, $id)
//    {
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
//    }

//    public function upload(Request $request)
//    {
//        $files= $request->file('file');
//        if(!empty($files)):
//            foreach ($files as $file):
//                Storage::put($file->getClientOriginalName(),file_get_contents($file));
//            endforeach;
//         endif;
//
//    }
}
