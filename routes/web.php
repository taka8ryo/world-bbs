<?php

use App\Http\Controllers\CommentController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/post/{id}', 'PostController@show')->name('posts.show');

    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::get('/posts/create', 'PostController@showCreateForm')->name('posts.create');
    Route::post('/posts/create', 'PostController@create');

    Route::get('/posts/{id}/edit', 'PostController@showEditForm')->name('posts.edit');
    Route::post('/posts/{id}/edit', 'PostController@edit');

    Route::get('/posts/{id}/delete', 'PostController@delete');

    Route::post('/comments/create', 'CommentController@create')->name('comments.create');

    Route::get('/comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
    Route::post('/comments/{id}/edit', 'CommentController@update');

    Route::get('/comments/{id}/delete', 'CommentController@delete');
});

Auth::routes();
