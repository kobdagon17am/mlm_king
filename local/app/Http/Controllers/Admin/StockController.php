<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
  public function index(Request $request)
  {

    // สาขา
    $get_branch = DB::table('branch')
      ->get();


    // สินค้า
    $get_product = DB::table('products')
      ->get();

    
    return view('backend/stock_in', compact('get_branch', 'get_product'));
  }


  public function get_data_warehouse_select(Request $request)
  {

    $get_warehouse = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      // ->where('status', 1)
      ->get();


    return response()->json($get_warehouse);
  }

  public function get_data_product_unit_select(Request $request)
  {

    $get_product_unit = DB::table('products')
      ->where('product_unit_id_fk', $request->id)
      ->get();

    return response()->json($get_product_unit);
  }
}
