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
    Route::get('/welcome', 'HomeController@welcome')->name('welcome');
    Route::get('/', 'HomeController@welcome')->name('welcome');
//    Route::get('/books/show', 'BookController@showBooks')->name('show-books');
//    Route::get('/genres/show', 'GenreController@showGenres')->name('show-genres');
    
    Route::get('/animals/show', 'AnimalController@showAnimals')->name('show-animals');
    
    Route::middleware('auth')->group(function () {
//        Route::get('/books/create', 'BookController@createBooks')->name('create-books');
//        Route::post('/books/store', 'BookController@storeBooks')->name('store-books');
//        Route::post('/books/edit/{id}', 'BookController@updateBooks')->name('update-books');
//        Route::post('/books/edit-store/{id}', 'BookController@updateStoreBooks')->name('update-store-books');
//        Route::post('/books/delete/{id}', 'BookController@deleteBooks')->name('delete-books');
//
//        Route::get('/genres/create', 'GenreController@createGenres')->name('create-genres');
//        Route::post('/genres/store', 'GenreController@storeGenres')->name('store-genres');
//        Route::post('/genres/edit/{id}', 'GenreController@updateGenres')->name('update-genres');
//        Route::post('/genres/edit-store/{id}', 'GenreController@updateStoreGenres')->name('update-store-genres');
//        Route::post('/genres/delete/{id}', 'GenreController@deleteGenres')->name('delete-genres');
//
        Route::get('/animals/create', 'AnimalController@createAnimals')->name('create-animals');
        Route::post('/animals/store', 'AnimalController@storeAnimals')->name('store-animals');
        Route::post('/animals/edit/{id}', 'AnimalController@updateAnimals')->name('update-animals');
        Route::post('/animals/edit-store/{id}', 'AnimalController@updateStoreAnimals')->name('update-store-animals');
        Route::post('/animals/delete/{id}', 'AnimalController@deleteAnimals')->name('delete-animals');
    
        Route::get('/races/show', 'RaceController@showRaces')->name('show-races');
        Route::get('/races/create', 'RaceController@createRaces')->name('create-races');
        Route::post('/races/store', 'RaceController@storeRaces')->name('store-races');
        Route::post('/races/edit/{id}', 'RaceController@updateRaces')->name('update-races');
        Route::post('/races/edit-store/{id}', 'RaceController@updateStoreRaces')->name('update-store-races');
        Route::post('/races/delete/{id}', 'RaceController@deleteRaces')->name('delete-races');
        
        // J'aurais aimé faire un middleware pour les auth qui en plus sont admin
        Route::get('/users/show', 'UserController@showUsers')->name('show-users');
        Route::get('/users/create', 'UserController@createUsers')->name('create-users');
        Route::post('/users/store', 'UserController@storeUsers')->name('store-users');
        Route::post('/users/edit/{id}', 'UserController@updateUsers')->name('update-users');
        Route::post('/users/edit-store/{id}', 'UserController@updateStoreUsers')->name('update-store-users');
        Route::post('/users/delete/{id}', 'UserController@deleteUsers')->name('delete-users');
        
    });