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

  Route::get('admin/Member', function () {
    return view('backend.member');
  })->name('admin/Member');

  Route::get('admin/MemberRegister', function () {
    return view('backend.member_regis');
  })->name('admin/MemberRegister');
