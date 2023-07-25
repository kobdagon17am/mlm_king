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


  public function index(Request $request)
  {
    // dd(Auth::guard('admin')->user()->id);
    $get_stock_in = DB::table('db_stocks')
      ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stocks.warehouse_id_fk')
      ->get();

    //  dd($get_stock_in->all());

    $get_branch = DB::table('branch')
      ->where('status', 1)
      ->get();

    return view('backend/stock_out', compact('get_stock_in', 'get_branch'));
  }


  public function get_data_warehouse_select(Request $request)
  {

    $get_warehouse = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      ->where('status', 1)
      ->get();

    return response()->json($get_warehouse);
  }

  public function get_data_warehouse_out_select(Request $request)
  {

    $get_warehouse_out = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      ->where('status', 1)
      ->get();

    return response()->json($get_warehouse_out);
  }


  public function get_data_product_select(Request $request)
  {
    // dd($request->all());
    $get_product_data = DB::table('db_stocks')
      ->select('products.id', 'products.product_name')
      ->join('products', 'products.id', 'db_stocks.product_id_fk')
      ->where('warehouse_id_fk', $request->id)
      ->get();

    return response()->json($get_product_data);
  }

  public function get_data_product_unit_select(Request $request)
  {

    // dd($request->all());
    $get_product_unit = DB::table('db_stocks')
      ->select('dataset_product_unit.id', 'dataset_product_unit.product_unit_th')
      ->join('dataset_product_unit', 'dataset_product_unit.id', 'db_stocks.product_unit_id_fk')
      ->where('product_id_fk', $request->id)
      ->get();

    return response()->json($get_product_unit);
  }

  public function get_lot_number(Request $request)
  {
    
    
    $get_lot_number = DB::table('db_stocks')
      ->select('lot_number')
      ->where('product_id_fk', $request->id)
      ->get();

      // dd($get_lot_number);

    return response()->json($get_lot_number);
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
        $get_stock_out = DB::table('db_stocks')
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

  // public function update_stock_out(Request $rs)
  // {
  //   // dd($rs->all());

  //   if ($rs->stock_status == "confirm") {
  //     // อัปเดตเมื่อ stock_status เป็น "confirm"
  //     $updateData = [
  //       'stock_status' => 'confirm',
  //       'approve_id_fk' => Auth::guard('admin')->user()->id,
  //       'approve_name' => Auth::guard('admin')->user()->first_name,
  //       'approve_date' => now(),
  //     ];

  //     DB::table('db_stocks')
  //       ->where('id', $rs->id)
  //       ->update($updateData);



  //     // Retrieve updated data from db_stocks table
  //     $get_stock_data = DB::table('db_stocks')
  //       ->where('id', '=', $rs->id)
  //       ->first();

  //     $query = DB::table('db_stock_movement')
  //       ->where('branch_id_fk', $get_stock_data->branch_id_fk)
  //       ->where('product_id_fk', $get_stock_data->product_id_fk)
  //       ->where('warehouse_id_fk', $get_stock_data->warehouse_id_fk)
  //       ->orderByDesc('id')
  //       ->first();

  //     if ($query === null) {
  //       // กรณี $query เป็น null
  //       $amt_balance = $get_stock_data->amt;
  //     } else {
  //       // กรณี $query ไม่เป็น null
  //       $amt_balance = $query->amt + $get_stock_data->amt;
  //     }

  //     $updateMovement = [
  //       'stock_id_fk' => $get_stock_data->id,
  //       'branch_id_fk' => $get_stock_data->branch_id_fk,
  //       'warehouse_id_fk' => $get_stock_data->warehouse_id_fk,
  //       'product_id_fk' => $get_stock_data->product_id_fk,
  //       'lot_number' => $get_stock_data->lot_number,
  //       'amt_balance' => $amt_balance,
  //       'amt' => $get_stock_data->amt,
  //       'in_out' => 1,
  //       'product_unit_id_fk' => $get_stock_data->product_unit_id_fk,
  //       'stock_status' => $get_stock_data->stock_status,
  //       'create_id_fk' => Auth::guard('admin')->user()->id,
  //       'create_name' => Auth::guard('admin')->user()->first_name,
  //       'approve_id_fk' => Auth::guard('admin')->user()->id,
  //       'approve_name' => Auth::guard('admin')->user()->first_name,
  //       'approve_date' => $get_stock_data->approve_date,
  //     ];

  //     DB::table('db_stock_movement')
  //       ->insert($updateMovement);



  //     return redirect('admin/Stock_in')->withSuccess('รับเข้าสินค้าสำเร็จ');
  //   } elseif ($rs->stock_status == "cancel") {
  //     // อัปเดตเมื่อ stock_status เป็น "cancel"
  //     $updateData = [
  //       'stock_status' => 'cancel'
  //     ];

  //     DB::table('db_stocks')
  //       ->where('id', $rs->id) // แนะนำให้ใช้ id หรือ primary key เพื่ออัปเดตแถวที่ต้องการ
  //       ->update($updateData);
  //     return redirect('admin/Stock_in')->withError('ยกเลิกการรับเข้าสินค้า');
  //   }
  // }

  // public function view_stock_out(Request $rs)
  // {
  //   // dd($rs->all());

  //   $get_stock_in = DB::table('db_stocks')
  //     ->select('db_stocks.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name', 'db_stock_doc.url', 'db_stock_doc.doc_name')
  //     ->leftJoin('products', 'products.id', '=', 'db_stocks.product_id_fk')
  //     ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stocks.branch_id_fk')
  //     ->leftJoin('db_stock_doc', 'db_stock_doc.stock_id_fk', '=', 'db_stocks.id')
  //     ->where('db_stocks.id', '=', $rs->id)
  //     ->first();

  //   // dd($get_stock_in);

  //   $data = ['status' => 'success', 'data' => $get_stock_in];

  //   return $data;

  //   // dd($data);
  // }

}
