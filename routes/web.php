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



Route::get('/create', 'MangasController@create');
Route::get('/create_chap', 'ChapsController@create');


//Route::get('/chap', 'ChapsController@index');


Route::get('/categories/{value}','CategoryController@pass_value');

Route::get('/chap/{value}','ChapsController@pass_value');


Route::resource('manga','MangasController');
Route::resource('chap','ChapsController');

//Route::resource('categories','CategoryController');
//Route::resource('detail','DetailssController');

