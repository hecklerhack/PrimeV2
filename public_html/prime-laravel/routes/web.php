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

Route::get('/', 'PagesController@index');

Route::get('/clogin', 'PagesController@clogin');

Route::get('/services', 'PagesController@services');

Route::get('/about/{id}/{name}', function ($id, $name) {
    return view('This is user '. $name. ' with an id of '. $id);
});

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index');