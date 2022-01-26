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

Route::get('index','ProductoController@index')->name('indexProduct');
Route::get('create','ProductoController@create')->name('createProduct');
Route::post('store','ProductoController@store')->name('storeProduct');
Route::post('edit','ProductoController@edit')->name('editProduct');
Route::post('update','ProductoController@update')->name('updateProduct');
Route::post('destroy','ProductoController@destroy')->name('destroyProduct');
Route::post('sale','VentasController@saleOfProducts')->name('saleProduct');
Route::post('save-sale','VentasController@saveSaleOfProducts')->name('SavesaleProduct');
Route::get('list-sale','VentasController@index')->name('indexSale');




