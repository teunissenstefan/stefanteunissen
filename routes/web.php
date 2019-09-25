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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/elements/order', 'ElementController@changeOrder')->name('elements.order');
Route::patch('/elements/order', 'ElementController@updateOrder')->name('elements.updateOrder');
Route::resource('elements', 'ElementController');
Route::resource('pages', 'PageController');
Route::get('/cardlists/{cardlist}/order', 'CardListController@changeOrder')->name('carditems.order');
Route::patch('/cardlists/{cardlist}/order', 'CardListController@updateOrder')->name('carditems.updateOrder');
Route::resource('cardlists', 'CardListController');
Route::get('/carditems/{cardlist}/create', 'CardItemController@create')->name('carditems.create');
Route::post('/carditems/{cardlist}/create', 'CardItemController@store')->name('carditems.store');
Route::resource('carditems', 'CardItemController')->except(['create','store']);