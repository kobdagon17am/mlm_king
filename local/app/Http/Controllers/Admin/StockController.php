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

    // หน่วยสินค้า
    $get_product_unit = DB::table('dataset_product_unit')
      ->get();


    return view('backend/stock_in', compact('get_branch', 'get_product', 'get_product_unit'));
  }


  public function get_data_warehouse_select(Request $request)
  {

    $get_warehouse = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      // ->where('status', 1)
      ->get();


    return response()->json($get_warehouse);
  }

  public function get_data_product_unit(Request $request)
  {
      $product_id =  $request->product_id;

      $get_warehouse = DB::table('products')
      (
          'dataset_product_unit.product_unit',
          'products_details.product_id_fk',
          'dataset_product_unit.id',
      )
          ->join('products_details', 'products_details.product_id_fk', 'products.id')
          ->join('dataset_product_unit', 'dataset_product_unit.product_unit_id', 'products.unit_id')
          ->where('products.id', $product_id)
          ->first();

      return response()->json($product_unit);
  }


}
