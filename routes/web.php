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

Route::resource('/welcome', 'ArticleController');

Route::resource('articles', 'ArticleController');


Route::resource('categories','CategoryController');

Route::resource('users','UserController');

Route::resource('commands', 'CommandController');

Route::get('/commands/{command}/edit', 'CommandController@edit')->name('commands.edit');

Route::post('/commands/{command}/update', 'CommandController@update')->name('commands.update');

Route::get('/commands/{command}/editWithAddress', 'CommandController@editWithAddress')->name('commands.editFacturation');

Route::post('/commands/{command}/updateWithAddress', 'CommandController@updateWithAddress')->name('commands.updateWithAddress');

//Route::resource('addresses', 'AddressController');

//Route::post('/commands/edit', 'AddressController@create');
//Route::put('/commands/edit', 'AddressController@store');
Route::post('commands/{command}/updateWithArticle', 'CommandController@UpdateWithArticle')->name('commands.updateWithArticle');
//very good idea !!!!!!!
//Route::resource('command', 'CommandController')->only(['show', 'update'])->names('command');
