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

////Route::get('/homeblade', function () {
////    return view('home');
////});
////
////Route::get('/listblade', function () {
////    return view('mangalist');
////});
////
////Route::get('/popblade', function () {
////    return view('pop');
////});
////
////Route::get('/test', function () {
////    return view('test');
////});
//Route::get('/hello', function () {
//    return 'its me fucking mario';
//});

/***********************************************
 Home controller get home layouts
 **********************************************/
Route::get('/home', 'HomeController@home' );
Auth::routes();


Route::get('/manga', 'HomeController@index')->name('home');

Route::get('/detail', 'DeatailController@index');

Route::get('/test', function () {
return view('mangas.page');
});