<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Arr;

class StockReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }


  public function index()
  {
    //     // dd(Auth::guard('admin')->user()->id);
    $get_stock_lot = DB::table('db_stock_lot')
      ->select('db_stock_lot.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stock_lot.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stock_lot.warehouse_id_fk')
      ->get();

    // dd($get_stock_lot);

       $get_branch = DB::table('branch')
      ->where('status', 1)
      ->get();

    $get_warehouse = DB::table('db_warehouse')
      ->where('status', 1)
      ->get();

    $get_product = DB::table('products')
      ->where('status', 1)
      ->get();


    return view('backend/stock_report', compact('get_stock_lot', 'get_branch', 'get_warehouse', 'get_product'));
  }

  public function get_data_warehouse_select(Request $request)
  {

    $get_warehouse = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      ->where('status', 1)
      ->get();

    return response()->json($get_warehouse);
  }
}
