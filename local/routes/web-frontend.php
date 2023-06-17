<?php

Route::get('/c', function () {
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('config:clear');
  $exitCode = Artisan::call('view:clear');


  // $exitCode = Artisan::call('config:cache');
  return back();
});


Auth::routes();


  Route::get('/', function () {

    // if(session('id')){
    if(Auth::guard('c_user')->check()){
      return redirect('home');
    }else{
      return view('auth/login');
    }
  });

  Route::get('login', function () {
    if(Auth::guard('c_user')->check()){
      return redirect('home');
    }else{
      return view('auth/login');

    }
  });

  Route::post('login','Frontend\LoginController@login')->name('login');

  Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
  })->name('logout');

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
Route::get('Order', function () {

  return view('frontend.order');
})->name('Order');
Route::get('Register', function () {

  return view('frontend.register');
})->name('Register');
Route::get('ProfileUpload', function () {

  return view('frontend.profile_upload');
})->name('ProfileUpload');
Route::get('Document', function () {

  return view('frontend.doc');
})->name('Document');
Route::get('ChangePassword', function () {

  return view('frontend.change_pwd');
})->name('ChangePassword');
Route::get('ContactUs', function () {

  return view('frontend.contact');
})->name('ContactUs');
Route::get('Coupon', function () {

  return view('frontend.code');
})->name('Coupon');
Route::get('ChangeAccount', function () {

  return view('frontend.change_account');
})->name('ChangeAccount');

// BEGIN eWallet withdraw
