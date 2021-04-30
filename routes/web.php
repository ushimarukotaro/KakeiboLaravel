<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/user', 'Auth\UserEditController@UserEditForm');
    Route::post('/user/edit/email', 'Auth\UserEditController@EmailUpdate');
    Route::post('/user/edit/password', 'Auth\UserEditController@PasswordChange');
    Route::get('/user/edit/delete', 'Auth\UserEditController@WithdrawalForm');
    Route::post('/user/edit/Withdrawal', 'Auth\UserEditController@Withdrawal');

    Route::get('/books/trash', 'BookController@trash')->name('books.trash');
    Route::get('/books/search', 'BookController@search')->name('books.search');

    Route::resource('books', 'BookController');
    Route::post('/books/monthly', 'BookController@monthly')->name('books.monthly');
    // Route::group(['middleware' => 'can:view,book'], function () {
        Route::post('/books/{book}/delete', 'BookController@delete')->name('books.delete');
        Route::post('/books/{book}/restore', 'BookController@restore')->name('books.restore');
    // });
    // Route::get('/books', 'BookController@index')->name('books.index');
    // Route::get('/books/{book}', 'BookController@show')->name('books.show');
    // Route::get('/books/create', 'BookController@create')->name('books.create');
    // Route::get('/books/edit/{book}', 'BookController@edit')->name('books.edit');
});

Auth::routes();
