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
    return view('auth.login');
});

Route::resource('blogs','BlogController')->middleware('auth');

Route::get('blog/{$id}','BlogController@edit')->name('blog.edit')->middleware('auth');
Route::put('blog/{$id}','BlogController@update')->name('blog.update')->middleware('auth');
Route::delete('blog/{$id}','BlogController@destroy')->name('blog.destroy')->middleware('auth');

Auth::routes();

Route::get('/hello', function(){
    return view('blogs.hello');
});
Route::resource('articles','articleController')->middleware('auth');







Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
