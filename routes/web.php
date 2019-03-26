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

Route::get('/', 'BookController@index');
Route::get('/search/{text}', 'BookController@search');
Route::get('/genre/{genre}', 'BookController@genre');
Route::get('book/{book}', 'BookController@show')->middleware('auth');
Route::post('comment/create', 'CommentController@create')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::resource('/book', 'Admin\BookController');
    Route::resource('/author', 'Admin\AuthorController');
    Route::resource('/genre', 'Admin\GenreController');
    Route::post('/cover/delete', 'Admin\CoverController@delete');
    Route::post('/file/delete', 'Admin\FileController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
