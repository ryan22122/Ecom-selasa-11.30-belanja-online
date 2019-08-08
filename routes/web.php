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

Route::auth();
Route::get('/', function(){
    return redirect('/produk');
});
Route::get('/produk', 'Frontend\LandingController@index');
Route::get('/produk/{id}', 'Frontend\LandingController@show');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'can:isAdmin', 'prefix' => 'admin'], function(){
        Route::get('/', function(){
            return redirect('/admin/transaksi');
        });
        Route::resource('/transaksi', 'Backend\TransaksiController');
        Route::resource('/barang', 'Backend\BarangController');
        Route::resource('/kategori', 'Backend\KategoriController');
        Route::resource('/user', 'Backend\UserController');
    });
    Route::group(['middleware' => 'can:isCustomer'], function(){
        Route::post('/cart/checkout', 'Frontend\CartController@checkout');
        Route::resource('/cart', 'Frontend\CartController');
        Route::get('/checkout', 'Frontend\CheckoutController@index');
        Route::post('/checkout', 'Frontend\CheckoutController@checkout');
        Route::get('/payment-confirmation/{id}', 'Frontend\PaymentConfirmationController@index');
        Route::get('/order', 'Frontend\OrderController@index');
    });
});
