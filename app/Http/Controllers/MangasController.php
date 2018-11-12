<?php

namespace App\Http\Controllers;
use App\Author;
use App\Category;
use App\Chap;
use App\Manga;
use App\Detail;
use App\Title;
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
//        $categories= Category::all();
        return view('mangas.create');
    }

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
          'title_id'=>'required',
          'author_id'=>'required',
          'detail_id'=>'required',
          'chap_id'=>'required',
          'image'=>'required',
          'category_id'=>'required'
      ]);
      //create manga
      $mangas = new Manga;
      $mangas->manga_name = $request->input('manga_name');
      $mangas->title_id = $request->input('title_id');
      $mangas->author_id = $request->input('author_id');
      $mangas->detail_id = $request->input('detail_id');
      $mangas->chap_id = $request->input('chap_id');
      $mangas->image = $request->input('image');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function showcategory($id)
//    {
//        // wait to fix chap
////        return Manga::find($id);
//
//
//        $categories = Category::findorfail($id);
//
////          $chapters = Chap::findorfail($id);
//        return view('mangas.show' )->with('categories',$categories);
////
//
//    }

    public function show($id)
    {
        // wait to fix chap
//        return Manga::find($id);
          $mangas = Manga::findorfail($id);
          $details = Detail::findorfail($id);
        $categories = Category::findorfail($id);
        $chapters = Chap::all();
//        $categories = Category::findorfail($id);



//          $chapters = Chap::findorfail($id);
        return view('mangas.show' )->with('mangas',$mangas)
                                        ->with('chapters',$chapters)
                                        ->with('categories',$categories)
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
        $mangas = Manga::findorfail($id);
        $details = Detail::findorfail($id);
        $categories = Category::findorfail($id);



//          $chapters = Chap::findorfail($id);
        return view('mangas.edit' )->with('mangas',$mangas)
//                                        ->with('chapters',$chapters)
            ->with('categories',$categories)
            ->with('details',$details);
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
            'title_id'=>'required',
            'author_id'=>'required',
            'detail_id'=>'required',
            'chap_id'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        //edit manga
        $mangas =  Manga::find($id);
        $mangas->manga_name = $request->input('manga_name');
        $mangas->title_id = $request->input('title_id');
        $mangas->author_id = $request->input('author_id');
        $mangas->detail_id = $request->input('detail_id');
        $mangas->chap_id = $request->input('chap_id');
        $mangas->image = $request->input('image');
        $mangas->category_id = $request->input('category_id');

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
        $mangas->delete();
        return redirect('/manga')->with('success', 'Manga delete');
    }
}
