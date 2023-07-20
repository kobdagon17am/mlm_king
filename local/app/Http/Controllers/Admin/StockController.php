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

    $get_stock_in = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stocks.branch_id_fk')
      ->get();

    // dd($get_stock_in);

    $get_branch = DB::table('branch')
      ->get();


    // สินค้า
    $get_product = DB::table('products')
      ->get();


    return view('backend/stock_in', compact('get_stock_in', 'get_branch', 'get_product'));
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

  public function insert(Request $rs)
  {
    // dd($rs->all());

    $get_branch = DB::table('branch')
      ->where('id', '=', $rs->branch_id_fk)
      ->first();

    $get_warehouse = DB::table('db_warehouse')
      ->where('id', '=', $rs->warehouse_id_fk)
      ->first();

    $get_product = DB::table('products')
      ->where('id', '=', $rs->product_id_fk)
      ->first();

    $dataPrepare = [
      'branch_id_fk' => $get_branch->id,
      'warehouse_id_fk' => $get_warehouse->id,
      'product_id_fk' => $get_product->id,
      'lot_number' => $rs->lot_number,
      'amt' => $rs->product_amount,
      'product_unit_id_fk' => $get_product->product_unit_id_fk,
      'doc_no' => $rs->doc_no,
      'date_in_stock' => $rs->date_stock_in,
      'lot_expired_date' => $rs->expire_stock_in,
      // 'file_stock_in' => $rs->file_stock_in,
    ];


    //  dd($dataPrepare);


    try {
      DB::BeginTransaction();
      $get_stock_in = DB::table('db_stocks')
        ->insert($dataPrepare);
      DB::commit();

      return redirect('admin/Stock_in')->withSuccess('รับเข้าสินค้าสำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Stock_in')->withError('รับเข้าสินค้าไม่สำเร็จ');
    }
  }

  public function edit_stock_in(Request $rs)
  {
    //  dd($rs->all());

    $get_branch = DB::table('branch')
      ->where('id', '=', $rs->branch_id_fk)
      ->first();

    $get_warehouse = DB::table('db_warehouse')
      ->where('id', '=', $rs->warehouse_id_fk)
      ->first();

    $get_product = DB::table('products')
      ->where('id', '=', $rs->product_id_fk)
      ->first();

    $dataPrepare = [
      'branch_id_fk' => $get_branch->id,
      'warehouse_id_fk' => $get_warehouse->id,
      'product_id_fk' => $get_product->id,
      'lot_number' => $rs->lot_number,
      'amt' => $rs->product_amount,
      'product_unit_id_fk' => $get_product->product_unit_id_fk,
      'doc_no' => $rs->doc_no,
      'date_in_stock' => $rs->date_stock_in,
      'lot_expired_date' => $rs->expire_stock_in,
      // 'file_stock_in' => $rs->file_stock_in,
    ];



    try {
      DB::BeginTransaction();
      $get_stock_in = DB::table('db_stocks')
        ->insert($dataPrepare);
      DB::commit();

      return redirect('admin/Stock_in')->withSuccess('แก้ไขข้อมูลสำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Stock_in')->withError('แก้ไขข้อมูลไม่สำเร็จ');
    }
  }

  public function view_stock_in(Request $rs)
  {
    // dd($rs->all());

    $get_stock_in = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stocks.branch_id_fk')
      ->where('db_stocks.id', '=', $rs->id)
      ->first();

      // dd($get_stock_in);

    // $img = DB::table('product_images')
    // ->where('product_id_fk', '=', $rs->id)
    // ->get();

    $data = ['status' => 'success', 'data' => $get_stock_in];


    return $data;
  }
}
