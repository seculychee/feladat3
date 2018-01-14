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


Route::get('/', 'PizzaController@welcome')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['prefix' => 'admin_pizza', 'as' => 'admin_pizza.'], function () {
//pizza admin műveletek
    Route::get('/', 'PizzaController@index');
    Route::post('/create', 'PizzaController@create')->name('newpizza');
    Route::put('/{pizza_id}', 'PizzaController@edit')->name('edit_pizza');
});


//kosár műveletek
Route::post('/addCart/{pizza_id}', 'CartController@create')->name('addCart');
Route::get('/myCart', 'CartController@show')->name('showCart');
Route::post('/storeCart', 'CartController@store')->name('storeCart');



Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
//rendelés admin műveletek
    Route::get('/', 'OrderController@index');
    Route::get('/editOrder/{id}', 'OrderController@edit')->name('editOrder');
    Route::put('/{order_id}', 'OrderController@update')->name('edit_order');
});