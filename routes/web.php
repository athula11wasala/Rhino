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

Route::group(["middileware" => 'web'], function() {

    Route::get('/', function () {
        return view('dashboard');
    });
    Route::any('add-order/', ['uses' => 'OrderDetailController@addOrder']);
    Route::any('view-order', ['uses' => 'OrderDetailController@viewOrder']);
});


