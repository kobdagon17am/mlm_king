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
Route::get('payment_form', 'Frontend\FC\ApiPAymentController@payment_form')->name('payment_form');
Route::post('payment_complete_backend', 'Frontend\FC\ApiPAymentController@payment_complete_backend')->name('payment_complete_backend');
Route::post('payment_complete', 'Frontend\FC\ApiPAymentController@payment_complete')->name('payment_complete');
require_once 'web-frontend.php';
require_once 'web-backend.php';

