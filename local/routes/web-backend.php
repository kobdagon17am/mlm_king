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
  Route::get('admin/Products','admin\ProductsController@index')->name('admin/Products');
  Route::post('admin/Products_insert','admin\ProductsController@insert')->name('admin/Products_insert');
  Route::get('admin/view_products','admin\ProductsController@view_products')->name('admin/view_products');
  Route::post('admin/edit_products','admin\ProductsController@edit_products')->name('admin/edit_products');


  Route::get('admin/EditProfile', function () {
    return view('backend.admin_edit_member');
  })->name('admin/EditProfile');

  // Route::get('admin/Category', function () {
  //   return view('backend.category');
  // })->name('admin/Category');
  Route::get('admin/Category','admin\CategoryController@index')->name('admin/Category');
  Route::post('admin/Category_insert','admin\CategoryController@insert')->name('admin/Category_insert');
  Route::get('admin/view_category','admin\CategoryController@view_category')->name('admin/view_category');
  Route::post('admin/edit_category','admin\CategoryController@edit_category')->name('admin/edit_category');

  


  // Route::get('admin/Unit', function () {
  //   return view('backend.unit');
  // })->name('admin/Unit');
  Route::get('admin/Unit','admin\UnitController@index')->name('admin/Unit');
  Route::post('admin/Unit_insert','admin\UnitController@insert')->name('admin/Unit_insert');
  Route::get('admin/view_unit','admin\UnitController@view_unit')->name('admin/view_unit');
  Route::post('admin/edit_unit','admin\UnitController@edit_unit')->name('admin/edit_unit');


  // Route::get('admin/Branch', function () {
  //   return view('backend.branch');
  // })->name('admin/Branch');
  Route::get('admin/Branch','admin\BranchController@index')->name('admin/Branch');
  Route::post('admin/Branch_insert','admin\BranchController@insert')->name('admin/Branch_insert');
  Route::get('admin/view_branch','admin\BranchController@view_branch')->name('admin/view_branch');
  Route::post('admin/edit_branch','admin\BranchController@edit_branch')->name('admin/edit_branch');

  
  