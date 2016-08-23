<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('articles', 'ArticlesController');
Route::get('articles/edit/{id}', 'ArticlesController@edit');
Route::post('update/{id}', 'ArticlesController@update');
Route::get('articles/delete/{id}', 'ArticlesController@destroy');
Route::get('articles/show/{id}', 'ArticlesController@show');
Route::get('articles/{id}/deleteMsg/', 'ArticlesController@DeleteMsg');


Route::resource('products', 'ProductsController');
Route::get('products/edit/{id}', 'ProductsController@edit');
Route::post('products/update/{id}', 'ProductsController@update');
Route::get('products/delete/{id}', 'ProductsController@delete');
Route::get('products/show/{id}', 'ProductsController@show');
Route::get('products/{id}/', 'ProductsController@destroy');

//post Resources
/********************* post ***********************************************/
Route::resource('posts','PostsController');
Route::post('posts/{id}/update','PostsController@update');
Route::get('posts/{id}/delete','PostsController@destroy');
Route::get('posts/{id}/deleteMsg','PostsController@DeleteMsg');
/********************* post ***********************************************/

Route::resource('comments', 'CommentsController');
