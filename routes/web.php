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
Route::resource('cardlists', 'CardListController');