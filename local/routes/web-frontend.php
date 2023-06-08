<?php

Route::get('/config-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('config:clear');
  $exitCode = Artisan::call('view:clear');


  // $exitCode = Artisan::call('config:cache');
  return back();
});

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// BEGIN eWallet withdraw
