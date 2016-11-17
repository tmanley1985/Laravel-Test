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

Route::get('/api-register', 'ApiRegistrationController@create');
Route::post('/api-register', 'ApiRegistrationController@register');

Route::get('/gui', function(){

	$table = [
			'names' => [ 'Thomas', 'Elizabeth'],
			'ages' => ['31', '26'],


		];


	$link = ['target' => 'http://mybrary.local/gui', 'text' => 'GUI Home', 'options' => ['btn', 'btn-primary']];

	$label = ['for' => 'email', 'label' => 'Email', 'classList' => []];

	$input = ['name' => 'email', 'placeholder' => 'Email', 'classList' => ['form-control']];

	return view('gui.show', compact('table', 'link', 'label', 'input'));
});
