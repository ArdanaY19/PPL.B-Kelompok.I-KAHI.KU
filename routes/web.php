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


Route::get('/ongkir', 'getApi@ongkir');
Route::get('getCity/ajax/{id}', 'getApi@ajax');
// Route::post('/', 'getApi@getOngkir');

Auth::routes();
Route::get('/login', 'PageController@home');
Route::get('/registercustomer', 'PageController@registercustomer');
Route::get('/registerpetani', 'PageController@registerpetani')->name('register');
Route::post('/postregistercustomer', 'PageController@postregistercustomer');
Route::post('/postregisterpetani', 'PageController@postregisterpetani');

Route::get('login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/profile', 'HomeController@profile')->name('profile');
// // Route::get('/logout', 'C_login@KlikLogout');
// Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
// Route::post('/update/{id}', 'HomeController@update')->name('update');
// Route::get('/produk', 'HomeController@produk')->name('produk');
// Route::get('/datapetani', 'HomeController@datapetani')->name('datapetani');
// Route::get('/datacustomer', 'HomeController@datacustomer')->name('datacustomer');
// Route::get('/artikel', 'HomeController@artikel')->name('artikel');
// Route::get('/showartikel', 'HomeController@showartikel')->name('showartikel');

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/home', 'AuthController@setviewhomeadmin');
    Route::get('/admin/datacustomer', 'AdminController@datacustomer');
    Route::get('/admin/datapetani', 'AdminController@datapetani');
    Route::get('/admin/dataproduk', 'AdminController@dataproduk');
    Route::get('/admin/datatransaksi', 'AdminController@datatransaksi');
    Route::get('/admin/artikel', 'ArtikelController@index');
    Route::get('/admin/buatartikel', 'ArtikelController@buatartikel');
    Route::post('/admin/artikel', 'ArtikelController@create');
    Route::delete('/admin/artikel/{id}', 'ArtikelController@delete');
    Route::get('/admin/editartikel/{id}', 'ArtikelController@editartikel');
    Route::post('/admin/artikel/{id}', 'ArtikelController@update');
});

Route::group(['middleware' => ['auth', 'CheckRole:petani']], function(){
    Route::get('/petani/dashboard', 'AuthController@setviewhomepetani');
    Route::get('/petani/{id}/profile', 'PetaniController@profile');
    Route::get('/petani/{id}/edit', 'PetaniController@editprofile');
    Route::post('/petani/{id}/update', 'PetaniController@updateprofile');
    Route::get('/petani/produk', 'PetaniProdukController@index');
    Route::get('/petani/buatproduk', 'PetaniProdukController@buatproduk');
    Route::post('/petani/produk', 'PetaniProdukController@create');
    Route::delete('/petani/produk/{id}', 'PetaniProdukController@delete');
    Route::get('/petani/editproduk/{id}', 'PetaniProdukController@editproduk');
    Route::post('/petani/produk/{id}', 'PetaniProdukController@update');
    Route::get('/petani/artikel', 'PetaniController@artikel');
    Route::get('/petani/showartikel/{id}', 'PetaniController@show');
    Route::get('/petani/verifikasi', 'PetaniProdukController@verif');
    Route::get('/petani/verifikasi/{id}', 'PetaniProdukController@verifikasiDetail');
    Route::get('/petani/disetujuiverifikasi/{id}', 'PetaniProdukController@disetujui');
    Route::get('/petani/ditolakverifikasi/{id}', 'PetaniProdukController@ditolak');
    Route::get('/petani/pendapatan', 'PetaniProdukController@pendapatan');
    Route::post('/petani/resi/{id}', 'PetaniProdukController@bukti');
});

Route::group(['middleware' => ['auth', 'CheckRole:customer']], function(){
    Route::get('/customer/index', 'AuthController@setviewhomecustomer');
    Route::get('/customer/{id}/profile', 'CustomerController@profile');
    Route::get('/customer/{id}/edit', 'CustomerController@editprofile');
    Route::post('/customer/{id}/update', 'CustomerController@updateprofile');
    Route::get('/customer/produk', 'ProdukController@index');
    Route::get('/customer/detailproduk/{id}', 'ProdukController@detail');
    Route::post('/customer/detailproduk/{id}', 'ProdukController@produk');
    Route::get('/customer/check_out', 'ProdukController@check_out');
    Route::delete('/customer/check_out/{id}', 'ProdukController@delete');
    Route::get('/customer/konfirmasi_check_out', 'ProdukController@konfirmasi');
    Route::get('/customer/history', 'ProdukController@history');
    Route::get('/customer/history/{id}', 'ProdukController@historyDetail');
    Route::get('/customer/artikel', 'CustomerController@artikel');
    Route::get('/customer/showartikel/{id}', 'CustomerController@show');
    Route::post('/customer/history/{id}', 'ProdukController@bukti');
    // Route::get('/customer/ongkir', 'ProdukController@ongkir');
    // Route::get('/getCity/ajax/{id}', 'ProdukController@getCitiesAjax');
    // Route::post('/customer/ongkir', 'ProdukController@getOngkir');
    // Route::get('/customer/ongkir', 'OngkirController@ongkir');
    // Route::get('/getCity/ajax/{id}', 'OngkirController@getCitiesAjax');
    // Route::get('/customer/ongkir', 'getApi@ongkir');
    // Route::get('getCity/ajax/{id}', 'getApi@ajax');
    
    
});
  
