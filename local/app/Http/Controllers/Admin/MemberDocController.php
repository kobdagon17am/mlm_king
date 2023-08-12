<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Arr;
use DataTables;

class MemberDocController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }


  public function index()
  {

    return view('backend/member_doc');
  }

  public function Member_Doc_datatable(Request $rs)
  {

    $get_member_doc = DB::table('customers')

      ->where('regis_doc1_status', '=', '1')
      ->orWhere('regis_doc2_status', '=', '1')
      ->orWhere('regis_doc3_status', '=', '1')
      ->orWhere('regis_doc4_status', '=', '1')
      ->orderBy('order_regis_file_date');


    // ->whereRaw(("case WHEN  '{$rs->s_branch_id_fk}' != ''  THEN  db_stock_lot.branch_id_fk = '{$rs->s_branch_id_fk}' else 1 END"))
    // ->whereRaw(("case WHEN  '{$rs->s_warehouse_id_fk}' != ''  THEN  db_stock_lot.warehouse_id_fk = '{$rs->s_warehouse_id_fk}' else 1 END"))
    // ->whereRaw(("case WHEN  '{$rs->s_product_name}' != ''  THEN  db_stock_lot.product_id_fk = '{$rs->s_product_name}' else 1 END"))
    // ->whereRaw(("case WHEN  '{$rs->s_lot_number}' != ''  THEN  db_stock_lot.lot_number = '{$rs->s_lot_number}' else 1 END"))
    // ->orderBy('id','desc'); 


    // ->whereRaw(("case WHEN  '{$rs->s_lot_number}' != ''  THEN  db_stock_lot.lot_number = '{$rs->s_lot_number}' else 1 END"))->get();
    // dd($rs->s_lot_number);


    // ->whereRaw(("case WHEN  '{$rs->position}' != ''  THEN  customers.qualification_id = '{$rs->position}' else 1 END"))
    // ->whereRaw(("case WHEN  '{$rs->id_card}' != ''  THEN  customers.id_card = '{$rs->id_card}' else 1 END"))


    //$query->orderBy($request->input('order.0.column'), $request->input('order.0.dir'))

    $sQuery = Datatables::of($get_member_doc);
    return $sQuery


      ->addColumn('username', function ($row) {
        return $row->username;
      })

      ->addColumn('first_name', function ($row) {
        return $row->first_name;
      })

      ->addColumn('last_name', function ($row) {
        return $row->last_name;
      })

      ->addColumn('upline_id', function ($row) {
        return $row->upline_id;
      })


      ->addColumn('regis_doc1_status', function ($row) {
        if ($row->regis_doc1_status == '0') {
          $html = '<span class="badge badge-rounded outline-badge-dark">ยังไม่ส่งเอกสาร</span>';
        } elseif ($row->regis_doc1_status == '1') {
          $html = '<a href="#!" onclick="edit(' . $row->id . ',1)"> <span class="badge badge-rounded outline-badge-warning">รอตรวจสอบ</span>';
        } elseif ($row->regis_doc1_status == '2') {
          $html = '<span class="badge badge-rounded badge-success">อนุมัติ</span>';
        } elseif ($row->regis_doc1_status == '3') {
          $html = '<span class="badge badge-rounded badge-danger">ไม่อนุมัติ</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('regis_doc2_status', function ($row) {
        if ($row->regis_doc2_status == '0') {
          $html = '<span class="badge badge-rounded outline-badge-dark">ยังไม่ส่งเอกสาร</span>';
        } elseif ($row->regis_doc2_status == '1') {
          $html = '<a href="#!" onclick="edit(' . $row->id . ',2)"> <span class="badge badge-rounded outline-badge-warning">รอตรวจสอบ</span>';
        } elseif ($row->regis_doc2_status == '2') {
          $html = '<span class="badge badge-rounded badge-success">อนุมัติ</span>';
        } elseif ($row->regis_doc2_status == '3') {
          $html = '<span class="badge badge-rounded badge-danger">ไม่อนุมัติ</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('regis_doc3_status', function ($row) {
        if ($row->regis_doc3_status == '0') {
          $html = '<span class="badge badge-rounded outline-badge-dark">ยังไม่ส่งเอกสาร</span>';
        } elseif ($row->regis_doc3_status == '1') {
          $html = '<a href="#!" onclick="edit(' . $row->id . ',3)"> <span class="badge badge-rounded outline-badge-warning">รอตรวจสอบ</span>';
        } elseif ($row->regis_doc3_status == '2') {
          $html = '<span class="badge badge-rounded badge-success">อนุมัติ</span>';
        } elseif ($row->regis_doc3_status == '3') {
          $html = '<span class="badge badge-rounded badge-danger">ไม่อนุมัติ</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('regis_doc4_status', function ($row) {
        if ($row->regis_doc4_status == '0') {
          $html = '<span class="badge badge-rounded outline-badge-dark">ยังไม่ส่งเอกสาร</span>';
        } elseif ($row->regis_doc4_status == '1') {
          $html = '<a href="#!" onclick="edit(' . $row->id . ',4)"> <span class="badge badge-rounded outline-badge-warning">รอตรวจสอบ</span>';
        } elseif ($row->regis_doc4_status == '2') {
          $html = '<span class="badge badge-rounded badge-success">อนุมัติ</span>';
        } elseif ($row->regis_doc4_status == '3') {
          $html = '<span class="badge badge-rounded badge-danger">ไม่อนุมัติ</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('order_regis_file_date', function ($row) {
        return "";
      })


      ->rawColumns(['regis_doc1_status', 'regis_doc2_status', 'regis_doc3_status', 'regis_doc4_status'])
      ->make(true);
  }

  public function Member_Doc_update(Request $rs)
  {

    dd($rs->all());
    if ($rs->member_doc_status == "confirm") {
      // อัปเดตเมื่อ member_doc_status เป็น "confirm"
      $updateData = [
        'regis_doc1_status' => '2'
      ];

      DB::table('customers')
        ->where('id', $rs->id)
        ->update($updateData);
    }
  }

  public function Member_Doc_view(Request $rs)
  {
    // dd($rs->all());

    $get_member_doc = DB::table('register_files')
    ->select('register_files.*', 'customers.first_name', 'customers.last_name', 'customers.id_card',)
      ->leftJoin('customers', 'customers.id', '=', 'register_files.customer_id')
      ->where('register_files.customer_id', '=', $rs->id)
      ->where('register_files.type', '=', $rs->type)
      ->first();

    // dd($get_member_doc);

    $data = ['status' => 'success', 'data' => $get_member_doc];

    return $data;
  }
}
