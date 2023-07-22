<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class StockController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
  public function index(Request $request)
  {

    // dd(Auth::guard('admin')->user()->id);

    $get_stock_in = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stocks.branch_id_fk')
      ->get();

    // dd($get_stock_in->all());

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

    if ($rs->stock_in_add == "success") {
      // Insert new stock record
      $dataPrepare = [
        'branch_id_fk' => $get_branch->id,
        'warehouse_id_fk' => $get_warehouse->id,
        'product_id_fk' => $get_product->id,
        'lot_number' => $rs->lot_number,
        'amt' => $rs->product_amount,
        'product_unit_id_fk' => $get_product->product_unit_id_fk,
        'doc_no' => $rs->doc_no,
        'date_in_stock' => $rs->date_stock_in,
        'stock_remark' => $rs->stock_remark,
        'lot_expired_date' => $rs->expire_stock_in,
        'create_id_fk' => Auth::guard('admin')->user()->id,
        'create_name' => Auth::guard('admin')->user()->name,
      ];

      // dd($dataPrepare);

      try {
        DB::beginTransaction();
        $get_stock_in = DB::table('db_stocks')
          ->where('id', $rs->id)
          ->insertGetId($dataPrepare);



        $file = $rs->doc_name;
        if (isset($file)) {

          $url = 'local/public/stock/' . date('Ym');
          $f_name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
          if ($file->getClientOriginalExtension() == 'pdf') {
            $type = 'pdf';
          } else {
            $type = 'img';
          }


          if ($file->move($url, $f_name)) {
            DB::table('db_stock_doc')->insert([
              'stock_id_fk' => $get_stock_in,
              'url' => $url,
              'doc_name' => $f_name,
              'type' => $type,
            ]);
          }
        }



        DB::commit();
        return redirect('admin/Stock_in')->withSuccess('รับเข้าสินค้าสำเร็จ');
      } catch (Exception $e) {
        DB::rollback();
        return redirect('admin/Stock_in')->withError('รับเข้าสินค้าไม่สำเร็จ');
      }
    }
  }

  public function update_stock_in(Request $rs)
  {
    // dd($rs->all());

    if ($rs->stock_status == "confirm") {
      // อัปเดตเมื่อ stock_status เป็น "confirm"
      $updateData = [
        'stock_status' => 'confirm',
        'approve_id_fk' => Auth::guard('admin')->user()->id,
        'approve_name' => Auth::guard('admin')->user()->name,
        'approve_date' => now(),

      ];


      DB::table('db_stocks')
        ->where('id', $rs->id)
        ->update($updateData);
      return redirect('admin/Stock_in')->withSuccess('รับเข้าสินค้าสำเร็จ');
    } elseif ($rs->stock_status == "cancel") {
      // อัปเดตเมื่อ stock_status เป็น "cancel"
      $updateData = [
        'stock_status' => 'cancel',

      ];
      DB::table('db_stocks')
        ->where('id', $rs->id) // แนะนำให้ใช้ id หรือ primary key เพื่ออัปเดตแถวที่ต้องการ
        ->update($updateData);
      return redirect('admin/Stock_in')->withError('ยกเลิกการรับเข้าสินค้า');
    }
  }

  public function view_stock_in(Request $rs)
  {
    // dd($rs->all());

    $get_stock_in = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name', 'db_stock_doc.url', 'db_stock_doc.doc_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stocks.branch_id_fk')
      ->leftJoin('db_stock_doc', 'db_stock_doc.stock_id_fk', '=', 'db_stocks.id')
      ->where('db_stocks.id', '=', $rs->id)
      ->first();

    // dd($get_stock_in);



    $data = ['status' => 'success', 'data' => $get_stock_in];


    return $data;

    dd($data);
  }
}
