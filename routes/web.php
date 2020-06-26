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

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/welcome', 'ArticleController');

Route::resource('articles', 'ArticleController');

Route::get('/', 'ArticleController@index')->name('welcome');


Route::resource('categories','CategoryController');

Route::resource('users','UserController');

Route::resource('commands', 'CommandController');
Route::get('commands/{command}/basket', 'CommandController@basket')->name('commands.basket');

Route::post('articles/{article}/update','ArticleController@updateQuantity')->name('articles.updateQuantity');

Route::get('/commands/{id}/edit', 'CommandController@edit')->name('commands.edit');

Route::post('/commands/{command}/update', 'CommandController@update')->name('commands.update');

Route::get('/commands/{command}/editFacturation', 'CommandController@createAddress')->name('commands.editFacturation');
Route::post('/commands/{command}/updateWithAddress', 'CommandController@updateWithAddress')->name('commands.updateWithAddress');

Route::get('/commands/{command}/editDelivery', 'CommandController@createDeliveryWithAddress')->name('commands.editDelivery');
Route::post('/commands/{command}/updateWithDelivery', 'CommandController@updateWithDelivery')->name('commands.updateWithDelivery');

Route::get('/commands/{command}/editDeliveryRetrait', 'CommandController@createDeliveryWithAddressRetrait')->name('commands.editDeliveryRetrait');
Route::post('/commands/{command}/updateWithDeliveryRetrait', 'CommandController@updateWithDeliveryRetrait')->name('commands.updateWithDeliveryRetrait');
//Route::get('/commands/{command}/updateWithAddress1', 'DeliveryController@updateWithAddress1')->name('deliveries.updateWithAddress1');
//Route::post('/commands/{command}/updateWithDeliveryWithAddress', 'CommandController@updateWithDeliveryWithAddress')->name('commands.updateWithDeliveryWithAddress');

//Route::post('/commands/edit', 'AddressController@create');
//Route::put('/commands/edit', 'AddressController@store');
Route::post('commands/{command}/updateWithArticle', 'CommandController@UpdateWithArticle')->name('commands.updateWithArticle');
//very good idea !!!!!!!
//Route::resource('command', 'CommandController')->only(['show', 'update'])->names('command');


//Route::get('/live_search', 'LiveSearchController@index');
//Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');

Route::get('/live_search','LiveSearchController@index');
Route::get('/live_search/search','LiveSearchController@search')->name('search');


Route::get('/commands/{command}/checkout', 'CommandController@checkout')->name('commands.checkout');
Route::get('/commands/{command}/confirm', 'CommandController@confirm')->name('commands.confirm');
