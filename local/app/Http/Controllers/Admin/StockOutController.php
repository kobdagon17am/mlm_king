<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class StockOutController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }


  public function index()
  {
    // dd(Auth::guard('admin')->user()->id);
    $get_stock = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stocks.warehouse_id_fk')
      ->get();



    // dd($get_stock);

    // $get_branch = DB::table('branch')
    //   ->where('status', 1)
    //   ->get();


    // dd($get_stock_lot);

    return view('backend/stock_out', compact('get_stock'));
  }

  public function view_modal($id)
  {

    $get_branch = DB::table('branch')
      ->where('status', 1)
      ->get();

    $get_warehouse = DB::table('db_warehouse')
      ->where('status', 1)
      ->get();

    $get_product = DB::table('products')
      ->where('status', 1)
      ->get();

    $get_stock = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stocks.warehouse_id_fk')
      ->where('db_stocks.id', $id)
      ->first();



    $get_stock_lot = DB::table('db_stock_lot')
      ->where('branch_id_fk', $get_stock->branch_id_fk)
      ->where('warehouse_id_fk', $get_stock->warehouse_id_fk)
      ->where('product_id_fk', $get_stock->product_id_fk)
      ->get();




    return view('backend/stock_out_detail', compact('get_branch', 'get_warehouse', 'get_product', 'get_stock', 'get_stock_lot'));
  }

  public function insert_stock_out(Request $rs)
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


    if ($rs->stock_out_add == "success") {
      // Insert new stock record
      $dataPrepare = [
        'branch_id_fk' => $get_branch->id,
        'branch_out_id_fk' => $rs->branch_out_id_fk,
        'warehouse_id_fk' => $get_warehouse->id,
        'warehouse_out_id_fk' => $rs->warehouse_out_id_fk,
        'product_id_fk' => $get_product->id,
        'lot_number' => $rs->lot_number,
        'amt_out' => $rs->product_amount_out,
        // 'product_unit_id_fk' => $get_product->product_unit_id_fk,
        'doc_no' => $rs->doc_no,
        'date_in_stock' => $get_stock_in->date_stock_in,
        'date_out_stock' => $rs->date_stock_out,
        'stock_remark' => $rs->stock_remark,
        // 'lot_expired_date' => $rs->expire_stock_in,
        'create_id_fk' => Auth::guard('admin')->user()->id,
        'create_name' => Auth::guard('admin')->user()->first_name,
        'stock_type' => $rs->stock_type,
      ];

      dd($dataPrepare);

      try {
        DB::beginTransaction();
        $get_stock_out = DB::table('db_stock_lot')
          ->insertGetId($dataPrepare);



        $file = $rs->doc_name;
        if (isset($file)) {

          $url = 'local/public/stock/out/' . date('Ym');
          $f_name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
          if ($file->getClientOriginalExtension() == 'pdf') {
            $type = 'pdf';
          } else {
            $type = 'img';
          }


          if ($file->move($url, $f_name)) {
            DB::table('db_stock_doc')->insert([
              'stock_id_fk' => $get_stock_out,
              'url' => $url,
              'doc_name' => $f_name,
              'type' => $type,
            ]);
          }
        }

        DB::commit();
        return redirect('admin/Stock_out')->withSuccess('นำออกสินค้าสำเร็จ');
      } catch (Exception $e) {
        DB::rollback();
        return redirect('admin/Stock_out')->withError('นำออกสินค้าไม่สำเร็จ');
      }
    }
  }
}
