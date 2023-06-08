<?php

Route::get('/config-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('config:clear');
  $exitCode = Artisan::call('view:clear');


  // $exitCode = Artisan::call('config:cache');
  return back();
});


Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::get('/', function () {

    if (Auth::check()) {

      return redirect('home');
    } else {

      return view('frontend/login');
    }
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
Route::get('Cart', function () {

  return view('frontend.cart');
})->name('Cart');




// BEGIN eWallet withdraw
