<?php

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


Route::get('/mangas', 'HomeController@index')->name('home');

//Route::get('/detail/', 'DetailController@index');







Route::get('/create', 'MangasController@create');

Route::get('/chap', 'ChapController@index');

Route::get('/category','CategoryController@getIndex');

//Route::get('/categories/action','CategoryController@getIndex');
//Route::get('/categories/adventure','CategoryController@getIndex');
//Route::get('/categories/sci-fi','CategoryController@getIndex');
//Route::get('/categories/horror','CategoryController@getIndex');
//Route::get('/categories/comady','CategoryController@getIndex');
//Route::get('/categories/romantic','CategoryController@getIndex');
//Route::get('/categories/fantasy','CategoryController@getIndex');

Route::get('/categories/{value}','CategoryController@pass_value');




Route::resource('manga','MangasController');

//Route::resource('categories','CategoryController');


//Route::resource('detail','DetailssController');

