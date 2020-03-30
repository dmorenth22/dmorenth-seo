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
Auth::routes();
Route::get('/', 'BlogController@index');



Route::group(['middleware' => 'auth'], function(){
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag','TagController');
    Route::get('/post/soft_delete', 'PostController@soft_delete')->name('post.soft_delete');
    Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::resource('/post','PostController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');
});
