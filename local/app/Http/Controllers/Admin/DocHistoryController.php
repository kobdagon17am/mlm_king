<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Arr;
use DataTables;

class DocHistoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }


  public function index()
  {


    return view('backend/history_doc');
  }

  public function History_Doc_datatable(Request $rs)
  {

    $get_history_doc = DB::table('customers')

      ->where('regis_doc_status', '=', 'approve')
      ->orderBy('regis_date_doc');
    // ->get();


    // dd($get_history_doc);

    $sQuery = Datatables::of($get_history_doc);
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
          $html = '<a href="#!" onclick="edit(' . $row->id . ',1)"> <span class="badge badge-rounded badge-success">อนุมัติ</span>';
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
          $html = '<a href="#!" onclick="edit(' . $row->id . ',2)"> <span class="badge badge-rounded badge-success">อนุมัติ</span>';
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
          $html = '<a href="#!" onclick="edit(' . $row->id . ',3)"> <span class="badge badge-rounded badge-success">อนุมัติ</span>';
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
          $html = '<a href="#!" onclick="edit(' . $row->id . ',4"> <span class="badge badge-rounded badge-success">อนุมัติ</span>';
        } elseif ($row->regis_doc4_status == '3') {
          $html = '<span class="badge badge-rounded badge-danger">ไม่อนุมัติ</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('regis_doc_status', function ($row) {
        $html = '<span class="badge badge-rounded badge-success">ผ่านการอนุมัติ</span>';

        return  $html;
      })

      ->addColumn('regis_date_doc', function ($row) {
        if ($row->regis_date_doc) {
          return date('Y/m/d', strtotime($row->regis_date_doc));
        } else {
          return '';
        }
      })


      ->rawColumns(['regis_doc1_status', 'regis_doc2_status', 'regis_doc3_status', 'regis_doc4_status', 'regis_doc_status'])
      ->make(true);
  }

  public function History_Doc_view(Request $rs)
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
