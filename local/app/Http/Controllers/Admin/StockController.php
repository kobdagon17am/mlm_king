<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
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
}
