<?php
Route::get('admin/Blank', function () {
    return view('backend.blank');
  })->name('admin/Blank');

  Route::get('admin/Login', function () {
    return view('auth.login_admin');
  })->name('admin/Login');

  Route::get('admin/Dashboard', function () {
    return view('backend.dashboard');
  })->name('admin/Dashboard');

  Route::get('admin/MemberRegister', function () {
    return view('backend.member_regis');
  })->name('admin/MemberRegister');

  Route::get('admin/MemberDocument', function () {
    return view('backend.member_doc');
  })->name('admin/MemberDocument');

  Route::get('admin/HistoryDocument', function () {
    return view('backend.history_doc');
  })->name('admin/HistoryDocument');

  // Route::get('admin/Products', function () {
  //   return view('backend.products');
  // })->name('admin/Products');
  Route::get('admin/Products','Admin\ProductsController@index')->name('admin/Products');
  Route::post('admin/Products_insert','Admin\ProductsController@insert')->name('admin/Products_insert');
  Route::get('admin/view_products','Admin\ProductsController@view_products')->name('admin/view_products');
  Route::post('admin/edit_products','Admin\ProductsController@edit_products')->name('admin/edit_products');


  Route::get('admin/EditProfile', function () {
    return view('backend.admin_edit_member');
  })->name('admin/EditProfile');

  // Route::get('admin/Category', function () {
  //   return view('backend.category');
  // })->name('admin/Category');
  Route::get('admin/Category','Admin\CategoryController@index')->name('admin/Category');
  Route::post('admin/Category_insert','Admin\CategoryController@insert')->name('admin/Category_insert');
  Route::get('admin/view_category','Admin\CategoryController@view_category')->name('admin/view_category');
  Route::post('admin/edit_category','Admin\CategoryController@edit_category')->name('admin/edit_category');




  // Route::get('admin/Unit', function () {
  //   return view('backend.unit');
  // })->name('admin/Unit');
  Route::get('admin/Unit','Admin\UnitController@index')->name('admin/Unit');
  Route::post('admin/Unit_insert','Admin\UnitController@insert')->name('admin/Unit_insert');
  Route::get('admin/view_unit','Admin\UnitController@view_unit')->name('admin/view_unit');
  Route::post('admin/edit_unit','Admin\UnitController@edit_unit')->name('admin/edit_unit');


  // Route::get('admin/Branch', function () {
  //   return view('backend.branch');
  // })->name('admin/Branch');
  Route::get('admin/Branch','Admin\BranchController@index')->name('admin/Branch');
  Route::post('admin/Branch_insert','Admin\BranchController@insert')->name('admin/Branch_insert');
  Route::get('admin/view_branch','Admin\BranchController@view_branch')->name('admin/view_branch');
  Route::post('admin/edit_branch','Admin\BranchController@edit_branch')->name('admin/edit_branch');


