<?php
use App\Manga;
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

//Route::get('/vip', function () {
//    return view('mangas.vip');
//});
//test search
//Route::get('/t', function () {
//    return view('mangas.search');
//});

/***********************************************
 Home controller get home layouts
 **********************************************/
//Route::get('/home', 'HomeController@home' );
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/vip', 'VipController@Index');

Route::get('/create', 'MangasController@create');
Route::get('/create_chap', 'ChapsController@create');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    if($q != ""){
        $mangas = Manga::where('manga_name','LIKE','%'.$q.'%')->get();
        if(count($mangas) > 0)
            return view('mangas.search')->withDetails($mangas)->withQuery ( $q );
    }
    return view('mangas.search')->withMessage("not found");
//    $mangas = Manga::where('manga_name','LIKE','%'.$q.'%')->get();  //orWhere('email','LIKE','%'.$q.'%')->get();
//    if(count($mangas) > 0)
//        return view('mangas.test')->withDetails($mangas)->withQuery ( $q );
//    else return view ('mangas.test')->withMessage('No Details found. Try to search again !');
});


//Route::get('/chap', 'ChapsController@index');


Route::get('/categories/{value}','CategoryController@pass_value');

Route::get('/chap/{value}','ChapsController@pass_value');


Route::resource('manga','MangasController');
Route::resource('chap','ChapsController');
Route::resource('vip','VipController');


//Route::resource('categories','CategoryController');
//Route::resource('detail','DetailssController');

