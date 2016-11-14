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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', 'BooksController');

Route::resource('bookshelves', 'BookshelfController');

Route::post('bookshelves/{bookshelf}/add', 'BookshelfController@add');

Route::post('/avatars', 'AvatarsController@store');

Route::get('/home', 'HomeController@index');

Route::get('/test', function(){

	dd(App\Facades\Helpers::castArrayValuesToLowerCase(['A','B']));
});
