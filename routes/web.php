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
    return view('welcomeLaravel');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeLaravel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeLaravel');

Route::resource('articles', 'ArticleController');

Route::resource('categories','CategoryController');

Route::resource('users','UserController');

Route::resource('commands', 'CommandController');

