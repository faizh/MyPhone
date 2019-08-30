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

Route::get('/','WebController@home');
Route::get('/shop','WebController@shop');
Route::get('/contact','WebController@contact');

Route::get('/login','AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::get('/register','UserController@register');
Route::post('/postregister','UserController@postregister');

Route::get('/cart','OrderController@cart');
Route::get('/addcart/{id}','OrderController@addcart');
Route::post('/addcartpost/{id}','OrderController@addcartpost');
Route::get('/cart/delete/{id}','OrderController@deletecart');
Route::get('/product/{id}','OrderController@product');
Route::post('/checkout','OrderController@checkout');
Route::post('/order','OrderController@order');
Route::get('/yourorder','OrderController@yourorder');
Route::get('/transfer/{id}','OrderController@transfer');
Route::post('/complete','OrderController@complete');
Route::post('/categories','OrderController@categories');
Route::get('/wishlist','OrderController@wishlist');
Route::get('/wishlist/{id}','OrderController@addwishlist');
Route::get('/wishlist/delete/{id}','OrderController@deletewishlist');