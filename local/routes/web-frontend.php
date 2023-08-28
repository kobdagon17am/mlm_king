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
    Auth::guard('c_user')->logout();
    //Session::flush();
    return redirect('login');
  })->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home_check_customer_id','Frontend\TreeController@home_check_customer_id')->name('home_check_customer_id');
Route::post('search','Frontend\TreeController@search')->name('search');
Route::get('modal_tree','Frontend\TreeController@modal_tree')->name('modal_tree');
Route::get('modal_add','Frontend\TreeController@modal_add')->name('modal_add');
Route::get('tree','Frontend\TreeController@index')->name('tree');
Route::get('home_type_tree','Frontend\TreeController@home_type_tree')->name('home_type_tree');
Route::post('tree','Frontend\TreeController@index')->name('tree');

Route::post('under_a','Frontend\TreeController@under_a')->name('under_a');
Route::post('under_b','Frontend\TreeController@under_b')->name('under_b');

Route::get('/getProvince', 'Fc\AddressController@getProvince')->name('getProvince');
Route::get('/getDistrict', 'Fc\AddressController@getDistrict')->name('getDistrict');
Route::get('/getTambon', 'Fc\AddressController@getTambon')->name('getTambon');
Route::get('/getZipcode', 'Fc\AddressController@getZipcode')->name('getZipcode');


Route::get('Blank', function () {
    return view('frontend.blank');
  });

Route::get('Profile', function () {
    return view('frontend.profile');
  })->name('Profile');

// Route::get('CartGeneral', function () {
//   return view('frontend.cart_general');
// })->name('CartGeneral');
Route::get('CartGeneral/{type}','Frontend\CartGeneralController@index')->name('CartGeneral');



// Route::get('CartGeneralDetail', function () {
//   return view('frontend.cart_general_detail');
// })->name('CartGeneralDetail');
Route::get('CartGeneralDetail/{type}/{id?}','Frontend\ProductDetailController@product_detail')->name('CartGeneralDetail');

Route::get('Cart', function () {

  return view('frontend.cart');
})->name('Cart');

Route::get('Order', function () {

  return view('frontend.order');
})->name('Order');



Route::get('Register/{username?}/{line_type?}','Frontend\RegisterController@index')->name('Register');


Route::post('Register_member','Frontend\RegisterController@member_register')->name('Register_member');
Route::get('check_id_card','Frontend\RegisterController@check_id_card')->name('check_id_card');


Route::get('ProfileUpload', function () {

  return view('frontend.profile_upload');
})->name('ProfileUpload');

// Route::get('Document', function () {
//   return view('frontend.doc');
// })->name('Document');
Route::get('Document','Frontend\DocumentController@index')->name('Document');


Route::get('ChangePassword', function () {

  return view('frontend.change_pwd');
})->name('ChangePassword');

Route::get('ContactUs', function () {

  return view('frontend.contact');
})->name('ContactUs');

// Route::get('Coupon', function () {

//   return view('frontend.coupon');
// })->name('Coupon');
Route::get('Coupon','Frontend\CouponController@index')->name('Coupon');

Route::get('ChangeAccount', function () {

  return view('frontend.change_account');
})->name('ChangeAccount');

Route::get('DirectSponsor', function () {

  return view('frontend.direct_sponsor');
})->name('DirectSponsor');

Route::get('Bonus', function () {

  return view('frontend.bonus');
})->name('Bonus');


// Route::get('RegisterSuccess', function () {
//   return view('frontend.register_success');
// })->name('RegisterSuccess');
Route::get('RegisterSuccess/{username}','Frontend\RegisterSuccessController@index')->name('RegisterSuccess');

// BEGIN eWallet withdraw
