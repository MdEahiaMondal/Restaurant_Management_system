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

Route::get('/','HomeController@index')->name('home');
Route::post('reservation','ReservationController@reservation')->name('reservation.store');

Auth::routes();


//************************** Backend Controller ********************************
Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'Backend'], function ()
{
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');


    Route::resource('sliders','SliderController');


    Route::resource('categories','CategoryController');


    Route::resource('items','ItemController');


    Route::resource('reservasions','ReservationController');

});
