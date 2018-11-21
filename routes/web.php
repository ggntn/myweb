<?php
use App\Manga;
use App\Author;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/***********************************************
 Home controller get home layouts
 **********************************************/
//Route::get('/home', 'HomeController@home' );
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');



Route::get('/create', 'MangasController@create');
Route::get('/create_chap', 'ChapsController@create');


//Route::get('/chap', 'ChapsController@index');


Route::get('/categories/{value}','CategoryController@pass_value');

Route::get('/chap/{value}','ChapsController@pass_value');

Route::resource('author','AuthorController',['except'=>['create','destroy']]);
Route::resource('manga','MangasController');
Route::resource('chap','ChapsController');
Route::resource('tag','TagController',['except'=>['create','destroy']]);


Route::any('/search',function(){
    $q = Input::get ( 'q' );
    if($q != ""){
        $mangas = Manga::where('manga_name','LIKE','%'.$q.'%')->get ();

        if(count($mangas) > 0)
            return view('mangas.search')->withDetails($mangas)->withQuery ( $q );
    }
    return view('mangas.search')->withMessage("not found");
//    $mangas = Manga::where('manga_name','LIKE','%'.$q.'%')->get();  //orWhere('email','LIKE','%'.$q.'%')->get();
//    if(count($mangas) > 0)
//        return view('mangas.test')->withDetails($mangas)->withQuery ( $q );
//    else return view ('mangas.test')->withMessage('No Details found. Try to search again !');
});

Route::get('lang/{lang}', function($lang){
    $availLanguages = ['en', 'th'];
    Session::put('locale', in_array($lang, $availLanguages)? $lang : Config::get('app.locale'));
    return redirect()->back();
});
//Route::resource('categories','CategoryController');
//Route::resource('detail','DetailssController');

