<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StockController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }


  public function index(Request $request)
  {


    $y = date('Y');
    $y = substr($y, -2);
    $code =  IdGenerator::generate([
        'table' => 'db_stock_lot',
        'field' => 'lot_number',
        'length' => 15,
        'prefix' => 'LOTIN'.$y.''.date("m").date("d"),
        'reset_on_prefix_change' => true
    ]);

    // dd($code);

    // dd(Auth::guard('admin')->user()->id);
    $get_stock_in = DB::table('db_stock_lot')
      ->select('db_stock_lot.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name')
      ->leftJoin('products', 'products.id', '=', 'db_stock_lot.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.id', '=', 'db_stock_lot.warehouse_id_fk')
      ->get();
    //  dd($get_stock_in->all());

    $get_branch = DB::table('branch')
      ->where('status', 1)
      ->get();

    // สินค้า
    $get_product = DB::table('products')
      ->where('status', 1)
      ->get();


    return view('backend/stock_in', compact('get_stock_in', 'get_branch', 'get_product','code'));
  }


  public function get_data_warehouse_select(Request $request)
  {

    $get_warehouse = DB::table('db_warehouse')
      ->where('branch_id_fk', $request->id)
      ->where('status', 1)
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
        // 'doc_no' => $rs->doc_no,
        'date_in_stock' => $rs->date_stock_in,
        'stock_remark' => $rs->stock_remark,
        'lot_expired_date' => $rs->expire_stock_in,
        'create_id_fk' => Auth::guard('admin')->user()->id,
        'create_name' => Auth::guard('admin')->user()->first_name,
        'stock_type' => $rs->stock_type,
      ];

      // dd($dataPrepare);

      try {
        DB::beginTransaction();
        $get_stock_in = DB::table('db_stock_lot')
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
              'warehouse_id_fk' => $dataPrepare['warehouse_id_fk'],
              'product_id_fk' => $dataPrepare['product_id_fk'],
              'product_unit_id_fk' => $dataPrepare['product_unit_id_fk'],
              'lot_number' => $dataPrepare['lot_number'],
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
        'approve_name' => Auth::guard('admin')->user()->first_name,
        'approve_date' => now(),
      ];

      DB::table('db_stock_lot')
        ->where('id', $rs->id)
        ->update($updateData);

      // update stock movement
      $get_stock_data = DB::table('db_stock_lot')
        ->where('id', '=', $rs->id)
        ->first();

      //amt balance
      $query = DB::table('db_stock_movement')
        ->where('branch_id_fk', $get_stock_data->branch_id_fk)
        ->where('warehouse_id_fk', $get_stock_data->warehouse_id_fk)
        ->where('product_id_fk', $get_stock_data->product_id_fk)
        ->orderByDesc('id')
        ->first();

      if (empty($query)) {
        // กรณี $query เป็น null
        $amt_balance = $get_stock_data->amt;
      } else {
        // กรณี $query ไม่เป็น null
        $amt_balance = $query->amt_balance + $get_stock_data->amt;
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
        $lot_balance = $query1->amt + $get_stock_data->amt;
      }

      $updateMovement = [
        'stock_id_fk' => $get_stock_data->id,
        'branch_id_fk' => $get_stock_data->branch_id_fk,
        'warehouse_id_fk' => $get_stock_data->warehouse_id_fk,
        'product_id_fk' => $get_stock_data->product_id_fk,
        'lot_number' => $get_stock_data->lot_number,
        'lot_balance' => $lot_balance,
        'amt_balance' => $amt_balance,
        'amt' => $get_stock_data->amt,
        'in_out' => $get_stock_data->stock_type,
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
        ->where('id', '=', $rs->id)
        ->first();

      $db_get_stock_balance = DB::table('db_stocks')
        ->where('branch_id_fk', $get_stock_lot_data->branch_id_fk)
        ->where('warehouse_id_fk', $get_stock_lot_data->warehouse_id_fk)
        ->where('product_id_fk', $get_stock_lot_data->product_id_fk)
        ->where('product_unit_id_fk', $get_stock_lot_data->product_unit_id_fk)
        // ->orderByDesc('id')
        ->first();
       


      if (empty($db_get_stock_balance)) {
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
        $get_stock_balance = $db_get_stock_balance->stock_balance + $get_stock_lot_data->amt;

        $updateStock = [
          // 'stock_id_fk' => $get_stock_lot_data->id,
          'branch_id_fk' => $get_stock_lot_data->branch_id_fk,
          'warehouse_id_fk' => $get_stock_lot_data->warehouse_id_fk,
          'product_id_fk' => $get_stock_lot_data->product_id_fk,
          'product_unit_id_fk' => $get_stock_lot_data->product_unit_id_fk,
          'stock_balance' => $get_stock_balance,
        ];

        DB::table('db_stocks')
        ->where('id',$db_get_stock_balance->id)
        ->update($updateStock);
      }

      return redirect('admin/Stock_in')->withSuccess('รับเข้าสินค้าสำเร็จ');
    } elseif ($rs->stock_status == "cancel") {
      // อัปเดตเมื่อ stock_status เป็น "cancel"
      $updateData = [
        'stock_status' => 'cancel'
      ];

      DB::table('db_stock_lot')
        ->where('id', $rs->id) // แนะนำให้ใช้ id หรือ primary key เพื่ออัปเดตแถวที่ต้องการ
        ->update($updateData);
      return redirect('admin/Stock_in')->withError('ยกเลิกการรับเข้าสินค้า');
    }
  }

  public function view_stock_in(Request $rs)
  {
    // dd($rs->all());

    $get_stock_in = DB::table('db_stock_lot')
      ->select('db_stock_lot.*', 'products.product_name', 'products.product_unit_name', 'db_warehouse.branch_name', 'db_warehouse.warehouse_name', 'db_stock_doc.url', 'db_stock_doc.doc_name')
      ->leftJoin('products', 'products.id', '=', 'db_stock_lot.product_id_fk')
      ->leftJoin('db_warehouse', 'db_warehouse.branch_id_fk', '=', 'db_stock_lot.branch_id_fk')
      ->leftJoin('db_stock_doc', 'db_stock_doc.stock_id_fk', '=', 'db_stock_lot.id')
      ->where('db_stock_lot.id', '=', $rs->id)
      ->first();

    // dd($get_stock_in);

    $data = ['status' => 'success', 'data' => $get_stock_in];

    return $data;

    // dd($data);
  }

  
}
