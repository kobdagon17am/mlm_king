<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Arr;

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
      ->where('stock_type', 'in')
      ->where('stock_status', 'confirm')
      ->get();

    // dd($get_stock_lot);

    $get_stock_out = DB::table('db_stock_out')
      ->select('db_stock_out.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stock_out.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stock_out.warehouse_id_fk')
      ->get();


    return view('backend/stock_out_detail', compact('get_branch', 'get_warehouse', 'get_product', 'get_stock', 'get_stock_lot', 'get_stock_out'));
  }

  public function get_data_warehouse_out_select(Request $request)
  {

    $get_warehouse_out = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      ->get();

    return response()->json($get_warehouse_out);
  }

  public function insert(Request $rs)
  {
    // dd($rs->all());

    $get_stock_data = DB::table('db_stock_lot')
      ->where('branch_id_fk', '=', $rs->branch_id_fk)
      ->first();

    // dd($get_stock_data);

    if ($rs->stock_out_add == "success") {
      // Insert new stock record

      try {
        DB::beginTransaction();

        foreach ($rs->amt as $key => $value) {
          if ($value > 0 || !empty($value)) {
            $dataPrepare = [
              'branch_id_fk' => $rs->branch_id_fk,
              'warehouse_id_fk' => $rs->warehouse_id_fk,
              'product_id_fk' => $rs->product_id_fk,
              'lot_number' => $rs->lot_number[$key],
              'product_unit_id_fk' => $get_stock_data->product_unit_id_fk,
              'date_in_stock' => $get_stock_data->date_in_stock,
              'stock_remark' => $get_stock_data->stock_remark,
              'lot_expired_date' => $get_stock_data->lot_expired_date,
              'create_id_fk' => Auth::guard('admin')->user()->id,
              'create_name' => Auth::guard('admin')->user()->first_name,

              'branch_out_id_fk' => $rs->branch_out_id_fk,
              'warehouse_out_id_fk' => $rs->warehouse_out_id_fk,
              'amt' => $value,
              'transaction_stock' => $rs->transaction_stock,
              'stock_type' => $rs->stock_type,

            ];
            // dd($dataPrepare);

            $get_stock_lot_out = DB::table('db_stock_lot')
              ->insertGetId($dataPrepare);
          }
          //dd($key,$value);

        }

        $total_amt_out_arr = array();
        $total_amt_out_arr = array_sum($rs->amt);

        // dd($total_amt_out_arr);

        $stock_out = [
          'transaction_stock' => $rs->transaction_stock,
          'branch_id_fk' => $rs->branch_id_fk,
          'warehouse_id_fk' => $rs->warehouse_id_fk,
          'product_id_fk' => $rs->product_id_fk,
          'product_unit_id_fk' => $get_stock_data->product_unit_id_fk,
          'branch_out_id_fk' => $rs->branch_out_id_fk,
          'warehouse_out_id_fk' => $rs->warehouse_out_id_fk,
          'total_amt_out' => $total_amt_out_arr,
          'stock_out_remark' => $rs->stock_out_remark,
          'create_id_fk' => Auth::guard('admin')->user()->id,
          'create_name' => Auth::guard('admin')->user()->first_name,
          'transaction_stock' => $rs->transaction_stock,

        ];
        // dd($stock_out);

        $get_stock_out = DB::table('db_stock_out')
          ->insertGetId($stock_out);


        DB::commit();
        return redirect('admin/Stock_out')->withSuccess('นำออกสินค้าสำเร็จ');
      } catch (Exception $e) {
        DB::rollback();
        return redirect('admin/Stock_out')->withError('นำออกสินค้าไม่สำเร็จ');
      }
    }
  }

  public function update_stock_out(Request $rs)
  {
    // dd($rs->all());

    if ($rs->stock_status == "confirm") {
      // อัปเดตเมื่อ stock_status เป็น "confirm"

      // update DB stock lot
      $updateData = [
        'stock_status' => 'confirm',
        'approve_id_fk' => Auth::guard('admin')->user()->id,
        'approve_name' => Auth::guard('admin')->user()->first_name,
        'approve_date' => now(),
      ];


      DB::table('db_stock_lot')
        ->where('transaction_stock', $rs->transaction_stock)
        ->update($updateData);
 

      // update DB stock out
      $updateOut = [
        'stock_status' => 'confirm',
        'approve_id_fk' => Auth::guard('admin')->user()->id,
        'approve_name' => Auth::guard('admin')->user()->first_name,
        'approve_date' => now(),
      ];

      
      DB::table('db_stock_out')
        ->where('transaction_stock', $rs->transaction_stock)
        ->update($updateOut);

      // update stock movement
      $get_stock_data = DB::table('db_stock_lot')
        ->where('transaction_stock', '=', $rs->transaction_stock)
        ->first();


      //amt balance
      $query = DB::table('db_stock_movement')
        ->where('branch_id_fk', $get_stock_data->branch_id_fk)
        ->where('warehouse_id_fk', $get_stock_data->warehouse_id_fk)
        ->where('product_id_fk', $get_stock_data->product_id_fk)
        ->orderByDesc('id')
        ->first();

        // dd($query);

      if ($query === null) {
        // กรณี $query เป็น null
        $amt_balance = $get_stock_data->amt;
      } else {
        // กรณี $query ไม่เป็น null
        $amt_balance = $query->amt_balance - $get_stock_data->amt;
      }

      //lot_balance
      $query1 = DB::table('db_stock_movement')
        ->where('branch_id_fk', $get_stock_data->branch_id_fk)
        ->where('product_id_fk', $get_stock_data->product_id_fk)
        ->where('warehouse_id_fk', $get_stock_data->warehouse_id_fk)
        ->where('lot_number', $get_stock_data->lot_number)
        ->orderByDesc('id')
        ->first();

      if ($query1 === null) {
        // กรณี $query เป็น null
        $lot_balance = $get_stock_data->amt;
      } else {
        // กรณี $query ไม่เป็น null
        $lot_balance = $query1->amt - $get_stock_data->amt;
      }

      $updateMovement = [
        'stock_id_fk' => $get_stock_data->id,
        'branch_id_fk' => $get_stock_data->branch_id_fk,
        'warehouse_id_fk' => $get_stock_data->warehouse_id_fk,
        'branch_out_id_fk' => $get_stock_data->branch_out_id_fk,
        'warehouse_out_id_fk' => $get_stock_data->warehouse_out_id_fk,
        'product_id_fk' => $get_stock_data->product_id_fk,
        'lot_number' => $get_stock_data->lot_number,
        'lot_balance' => $lot_balance,
        'amt_balance' => $amt_balance,
        'amt' => $get_stock_data->amt,
        'in_out' => 'transfer',
        'product_unit_id_fk' => $get_stock_data->product_unit_id_fk,
        'stock_status' => $get_stock_data->stock_status,
        'create_id_fk' => Auth::guard('admin')->user()->id,
        'create_name' => Auth::guard('admin')->user()->first_name,
        'approve_id_fk' => Auth::guard('admin')->user()->id,
        'approve_name' => Auth::guard('admin')->user()->first_name,
        'approve_date' => $get_stock_data->approve_date,
      ];

      DB::table('db_stock_movement')
        ->insert($updateMovement);

      // update lot balance in db_stock_lot
      DB::table('db_stock_lot')
        ->where('branch_id_fk', $get_stock_data->branch_id_fk)
        ->where('product_id_fk', $get_stock_data->product_id_fk)
        ->where('warehouse_id_fk', $get_stock_data->warehouse_id_fk)
        ->where('lot_number', $get_stock_data->lot_number)
        ->update(['lot_balance' => $lot_balance]);


      // update stock balance
      $get_stock_lot_data = DB::table('db_stock_lot')
        ->where('transaction_stock', '=', $rs->transaction_stock)
        ->first();

      $get_stock_balance = DB::table('db_stocks')
        ->where('branch_id_fk', $get_stock_lot_data->branch_id_fk)
        ->where('warehouse_id_fk', $get_stock_lot_data->warehouse_id_fk)
        ->where('product_id_fk', $get_stock_lot_data->product_id_fk)
        ->where('product_unit_id_fk', $get_stock_lot_data->product_unit_id_fk)
        // ->orderByDesc('id')
        ->first();


      if ($get_stock_balance === null) {
        // กรณี $get_stock_balance เป็น null
        $get_stock_balance = $get_stock_lot_data->amt;

        $updateStock = [
          // 'stock_id_fk' => $get_stock_lot_data->id,
          'branch_id_fk' => $get_stock_lot_data->branch_id_fk,
          'warehouse_id_fk' => $get_stock_lot_data->warehouse_id_fk,
          'product_id_fk' => $get_stock_lot_data->product_id_fk,
          'product_unit_id_fk' => $get_stock_lot_data->product_unit_id_fk,
          'stock_balance' => $get_stock_balance,
        ];
        DB::table('db_stocks')
          ->insert($updateStock);
      } else {
        // กรณี $get_stock_balance ไม่เป็น null
        $get_stock_balance = $get_stock_balance->stock_balance - $get_stock_lot_data->amt;

        $updateStock = [
          // 'stock_id_fk' => $get_stock_lot_data->id,
          'branch_id_fk' => $get_stock_lot_data->branch_id_fk,
          'warehouse_id_fk' => $get_stock_lot_data->warehouse_id_fk,
          'product_id_fk' => $get_stock_lot_data->product_id_fk,
          'product_unit_id_fk' => $get_stock_lot_data->product_unit_id_fk,
          'stock_balance' => $get_stock_balance,
        ];

        DB::table('db_stocks')
          ->update($updateStock);
      }

      return redirect('admin/Stock_out')->withSuccess('จ่ายออกสินค้าสำเร็จ');
    } elseif ($rs->stock_status == "cancel") {
      // อัปเดตเมื่อ stock_status เป็น "cancel"
      $updateData = [
        'stock_status' => 'cancel'
      ];

      DB::table('db_stock_lot')
        ->where('id', $rs->id) // แนะนำให้ใช้ id หรือ primary key เพื่ออัปเดตแถวที่ต้องการ
        ->update($updateData);
      return redirect('admin/Stock_out')->withError('ยกเลิกการรับเข้าสินค้า');
    }
  }

  public function view_stock_out(Request $rs)
  {
    // dd($rs->all());

    $get_stock_out = DB::table('db_stock_out')
      ->select('db_stock_out.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stock_out.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stock_out.branch_id_fk')
      ->where('db_stock_out.id', '=', $rs->id)
      ->first();

    // dd($get_stock_in);

    $data = ['status' => 'success', 'data' => $get_stock_out];

    return $data;

    // dd($data);
  }
}
