<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

  public function index()
  {
    // dd('111');

    $get_promotion = DB::table('promotion')
      // ->where('username','=',Auth::guard('c_user')->user()->username)
      // ->where('password','=',md5($req->password))
      // ->first();
      ->get();

    return view('backend/promotion', compact('get_promotion'));
  }

  public function insert(Request $rs)
  {

    $dataPrepare = [
      'promotion_name' => $rs->promotion_name,
      'promotion_type' => $rs->promotion_type,
      'promotion_detail' => $rs->promotion_detail,
      'promotion_start_date' => $rs->promotion_start_date,
      'promotion_end_date' => $rs->promotion_end_date,
      'promotion_status' => $rs->promotion_status,
    ];

    // dd($dataPrepare);

    try {
      DB::BeginTransaction();
      $get_promotion = DB::table('promotion')
        ->insert($dataPrepare);
      DB::commit();
      return redirect('admin/Promotion')->withSuccess('เพิ่มโปรโมชั่นสินค้าสำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Promotion')->withError('เพิ่มโปรโมชั่นสินค้าไม่สำเร็จ');

    }

    // dd('success');

  }

  public function edit_promotion(Request $rs)
  {

    $dataPrepare = [
      'promotion_name' => $rs->promotion_name,
      'promotion_type' => $rs->promotion_type,
      'promotion_detail' => $rs->promotion_detail,
      'promotion_start_date' => $rs->promotion_start_date,
      'promotion_end_date' => $rs->promotion_end_date,
      'promotion_status' => $rs->promotion_status,
    ];

    try {
      DB::BeginTransaction();

      $get_promotion = DB::table('promotion')
      ->where('id','=',$rs->id)
        ->update($dataPrepare);

        DB::commit();
        return redirect('admin/Promotion')->withSuccess('แก้ไขโปรโมชั่นสินค้าสำเร็จ');
      } catch (Exception $e) {
        DB::rollback();
        return redirect('admin/Promotion')->withError('แก้ไขโปรโมชั่นสินค้าไม่สำเร็จ');
  
      }

  }


  public function view_promotion(Request $rs)
  {
     $promotion = DB::table('promotion')
     ->where('id','=',$rs->id)
     ->first();
     $data = ['status' => 'success', 'data' => $promotion];


     return $data;

  }

  public function promotion_datatable(Request $rs)
  {

    $get_promotion = DB::table('promotion')
      ->get();
    
    $sQuery = Datatables::of($get_promotion);
    return $sQuery


      ->addColumn('promotion_name', function ($row) {
        return $row->promotion_name;
      })

      ->addColumn('promotion_type', function ($row) {
        if ($row->promotion_type == 'General') {
          $html = '<span class="badge outline-badge-info">โปรโมชั่นสินค้าทั่วไป</span>';
        } elseif ($row->promotion_type == 'Warehouse') {
          $html = '<span class="badge outline-badge-warning">โปรโมชั่นเปิดคลังใบหยก</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('promotion_detail', function ($row) {
        return $row->promotion_detail;
      })


      ->addColumn('promotion_start_date', function ($row) {


        if ($row->promotion_start_date) {
          return date('Y/m/d H:i:s', strtotime($row->promotion_start_date));
        } else {
          return '';
        }
      })

      ->addColumn('promotion_end_date', function ($row) {


        if ($row->promotion_end_date) {
          return date('Y/m/d H:i:s', strtotime($row->promotion_end_date));
        } else {
          return '';
        }
      })

      ->addColumn('promotion_status', function ($row) {

        if ($row->promotion_status == '1') {
          $html = '<span class="badge badge-pill badge-success light">เปิดใช้งาน</span>';
        } elseif ($row->promotion_status == '0') {
          $html = '<span class="badge badge-pill badge-danger light">ปิดใช้งาน</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('action', function ($row) {

        $html = '<a href="#!" onclick="edit(' . $row->id . ')" class="p-2">
              <i class="lab la-whmcs font-25 text-warning"></i></a>';
        return $html;
      })


      ->rawColumns(['promotion_type','promotion_status', 'action'])

      ->make(true);
  }
}
