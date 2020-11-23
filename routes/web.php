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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/logout', 'C_login@KlikLogout');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::post('/update/{id}', 'HomeController@update')->name('update');
Route::get('/produk', 'HomeController@produk')->name('produk');
Route::get('/datapetani', 'HomeController@datapetani')->name('datapetani');
Route::get('/datacustomer', 'HomeController@datacustomer')->name('datacustomer');
Route::get('/artikel', 'HomeController@artikel')->name('artikel');
Route::get('/showartikel', 'HomeController@showartikel')->name('showartikel');
