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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('articles', 'ArticleController');


Route::resource('categories','CategoryController');

Route::resource('users','UserController');

Route::resource('commands', 'CommandController');

Route::resource('addresses', 'AddressController');

//Route::post('/commands/edit', 'AddressController@create');
//Route::put('/commands/edit', 'AddressController@store');
Route::post('articles/{article}/updateWithArticle', 'CommandController@UpdateWithArticle')->name('updateArticle');
//very good idea !!!!!!!
Route::resource('command', 'CommandController')->only(['show', 'update'])->names('command');
