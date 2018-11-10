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

Route::get('/detail/', 'DetailController@index');



Route::get('/create', 'MangaController@create');

Route::resource('manga','MangasController');



Route::resource('detail','DetailssController');

