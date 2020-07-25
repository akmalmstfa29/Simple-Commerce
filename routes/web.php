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

Route::get('/', 'HomeController@homepage')->name('homepage');
Route::get('/product-detail/{product}', 'HomeController@productDetail')->name('product-detail');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::post('/cart', 'HomeController@addToCart')->name('add-to-cart');
Route::post('/update-cart', 'HomeController@updateCart')->name('update-cart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
