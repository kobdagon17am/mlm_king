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
