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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashPosts@index')->name('welcome');

Route::resource('/', 'DashPosts');

Route::delete('/destroy/{id}', function ($post) {
    $post_tmp=\App\Posts::where('id',$post);
    $post_tmp->delete();
    return redirect('/');
})->name ('destroy');
