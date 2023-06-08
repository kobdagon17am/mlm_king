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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Blank', function () {
    return view('frontend.blank');
  });

Route::get('Profile', function () {
    return view('frontend.profile');
  })->name('Profile');

Route::get('CartGeneral', function () {
  return view('frontend.cart_general');
})->name('CartGeneral');

Route::get('CartGeneralDetail', function () {
  return view('frontend.cart_general_detail');
})->name('CartGeneralDetail');


Auth::routes();



// BEGIN eWallet withdraw
