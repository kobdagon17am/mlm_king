<?php


Route::get('admin', function () {

    if (Auth::guard('admin')->check()) {

        return redirect('admin/Dashboard');
    } else {
        return view('auth.login_admin');
    }

})->name('admin');


Route::post('admin_login', 'Admin\LoginController@admin_login')->name('admin_login');

Route::get('admin/Dashboard','Admin\DashboardController@index')->name('admin/Dashboard');

Route::get('logout_admin', function () {
    Auth::guard('admin')->logout();
    //Session::flush();
    return view('auth.login_admin');
  })->name('logout_admin');

Route::get('admin/Blank', function () {
    return view('backend.blank');
  })->name('admin/Blank');




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


  // Route::get('admin/AdminData', function () {
  //   return view('backend.admin_data');
  // })->name('admin/AdminData');
  Route::get('admin/AdminData','Admin\AdminDataController@index')->name('admin/AdminData');
  Route::post('admin/AdminData_insert','Admin\AdminDataController@insert')->name('admin/AdminData_insert');
  Route::get('admin/view_admin_data','Admin\AdminDataController@view_admin_data')->name('admin/view_admin_data');
  Route::post('admin/edit_admin_data','Admin\AdminDataController@edit_admin_data')->name('admin/edit_admin_data');



  // Route::get('admin/Category', function () {
  //   return view('backend.category');
  // })->name('admin/Category');
  Route::get('admin/Category','Admin\CategoryController@index')->name('admin/Category');
  Route::post('admin/Category_insert','Admin\CategoryController@insert')->name('admin/Category_insert');
  Route::get('admin/view_category','Admin\CategoryController@view_category')->name('admin/view_category');
  Route::post('admin/edit_category','Admin\CategoryController@edit_category')->name('admin/edit_category');


  // Route::get('admin/Bank', function () {
  //   return view('backend.bank');
  // })->name('admin/Bank');
  Route::get('admin/Bank','Admin\BankController@index')->name('admin/Bank');
  Route::post('admin/Bank_insert','Admin\BankController@insert')->name('admin/Bank_insert');
  Route::get('admin/view_bank','Admin\BankController@view_bank')->name('admin/view_bank');
  Route::post('admin/edit_bank','Admin\BankController@edit_bank')->name('admin/edit_bank');


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

  // Route::get('admin/Warehouse', function () {
  //   return view('backend.Warehouse');
  // })->name('admin/Warehouse');
  Route::get('admin/Warehouse','Admin\WarehouseController@index')->name('admin/Warehouse');
  Route::post('admin/Warehouse_insert','Admin\WarehouseController@insert')->name('admin/Warehouse_insert');
  Route::get('admin/view_warehouse','Admin\WarehouseController@view_warehouse')->name('admin/view_warehouse');
  Route::post('admin/edit_warehouse','Admin\WarehouseController@edit_warehouse')->name('admin/edit_warehouse');

  // Route::get('admin/Stock_in', function () {
  //   return view('backend.Stock_in');
  // })->name('admin/Stock_in');
  Route::get('admin/Stock_in','Admin\StockController@index')->name('admin/Stock_in');
  Route::get('admin/get_data_warehouse_select', 'Admin\StockController@get_data_warehouse_select')->name('get_data_warehouse_select');
  Route::get('admin/get_data_product_unit_select', 'Admin\StockController@get_data_product_unit_select')->name('get_data_product_unit_select');
  Route::post('admin/Stockin_insert','Admin\StockController@insert')->name('admin/Stockin_insert');
  Route::get('admin/view_stock_in','Admin\StockController@view_stock_in')->name('admin/view_stock_in');
  Route::post('admin/update_stock_in','Admin\StockController@update_stock_in')->name('admin/update_stock_in');
    // END receive

  // Route::get('admin/Stock_out', function () {
  //   return view('backend.Stock_out');
  // })->name('admin/Stock_out');
  Route::get('admin/Stock_out','Admin\StockOutController@index')->name('admin/Stock_out');
  Route::get('admin/get_data_warehouse_select', 'Admin\StockOutController@get_data_warehouse_select')->name('get_data_warehouse_select');
  Route::get('admin/get_data_warehouse_out_select', 'Admin\StockOutController@get_data_warehouse_out_select')->name('get_data_warehouse_out_select');
  Route::get('admin/get_data_product_select', 'Admin\StockOutController@get_data_product_select')->name('get_data_product_select');
  Route::get('admin/get_data_product_unit_select', 'Admin\StockOutController@get_data_product_unit_select')->name('get_data_product_unit_select');
  Route::post('admin/Stockout_insert','Admin\StockOutController@insert_stock_out')->name('admin/Stockout_insert');
  // Route::get('admin/view_stock_out','Admin\StockOutController@view_stock_out')->name('admin/view_stock_out');
  // Route::post('admin/update_stock_out','Admin\StockOutController@update_stock_out')->name('admin/update_stock_out');
