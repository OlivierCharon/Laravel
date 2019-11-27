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
Route::get('/hw', 'HomeController@welcome')->name('welcome');
Route::get('/new', 'HomeController@new')->name('new');
Route::get('/books/show', 'BookController@showBooks')->name('show-books');
Route::get('/books/create', 'BookController@createBooks')->name('create-books');
Route::post('/books/store', 'BookController@storeBooks')->name('store-books');
Route::post('/books/edit/{id}', 'BookController@updateBooks')->name('update-books');
Route::post('/books/edit-store/{id}', 'BookController@updateStoreBooks')->name('update-store-books');
Route::post('/books/delete/{id}', 'BookController@deleteBooks')->name('delete-books');
