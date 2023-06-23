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

  Route::get('admin/Products', function () {
    return view('backend.products');
  })->name('admin/Products');

  