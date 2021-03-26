<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('books','BookController');
// Route::get('/books', 'BookController@index')->name('books.index');
// Route::get('/books/{book}', 'BookController@show')->name('books.show');
// Route::get('/books/create', 'BookController@create')->name('books.create');
