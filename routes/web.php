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

//Route::get('/countries', 'CountryController@index');

Route::resource('countries', 'CountryController');

Route::resource('cities', 'CityController');
Route::resource('providers', 'ProviderController');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('stores', 'StoreController');
Route::get('stores/{store}', 'ProductStoreController@index')->name('stores.show');
Route::get('stores/{store}/buy', 'ProductStoreController@create')->name('stores.buy');
Route::post('stores/{store}/purchase', 'ProductStoreController@store')->name('stores.purchase');
Route::get('stores/{purchase}/{store}/edit_product', 'ProductStoreController@edit')->name('stores.edit_product');
Route::put('stores/{purchase}/update', 'ProductStoreController@updateP')->name('stores.update_product');
Route::delete('store/{purchase}', 'ProductStoreController@delete')->name('stores.delete');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
