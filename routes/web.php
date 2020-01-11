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

Route::resource('blogs','BlogController');

Route::get('blog/{$id}','BlogController@edit')->name('blog.edit');
Route::put('blog/{$id}','BlogController@update')->name('blog.update');
Route::delete('blog/{$id}','BlogController@destroy')->name('blog.destroy');

Auth::routes();

Route::get('/hello', function(){
    return view('blogs.hello');
});
Route::resource('articles','articleController');


Route::get('/home', 'HomeController@index')->name('home');
