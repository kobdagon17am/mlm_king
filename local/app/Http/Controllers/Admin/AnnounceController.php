<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;

class AnnounceController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function index()
  {
    // dd('111');

    $get_announce = DB::table('announce')
      // ->where('username','=',Auth::guard('c_user')->user()->username)
      // ->where('password','=',md5($req->password))
      // ->first();
      ->get();

    return view('backend/announce', compact('get_announce'));
  }

  public function insert(Request $rs)
  {

    $dataPrepare = [
      'announce' => $rs->announce,
      'announce_status' => $rs->announce_status,
    ];

    // dd($dataPrepare);

    try {
      DB::BeginTransaction();
      $get_announce = DB::table('announce')
        ->insertGetId($dataPrepare);
      DB::commit();
      return redirect('admin/Announce')->withSuccess('เพิ่มข่าวประชาสัมพันธ์สำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Announce')->withError('เพิ่มข่าวประชาสัมพันธ์ไม่สำเร็จ');
    }

    // dd('success');

  }

  public function edit_announce(Request $rs)
  {

    $dataPrepare = [
      'announce' => $rs->announce,
      'announce_status' => $rs->announce_status,
    ];

    try {
      DB::BeginTransaction();

      $get_announce = DB::table('announce')
        ->where('id', '=', $rs->id)
        ->update($dataPrepare);
      DB::commit();
      return redirect('admin/Announce')->withSuccess('แก้ไขข่าวประชาสัมพันธ์สำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Announce')->withError('แก้ไขข่าวประชาสัมพันธ์ไม่สำเร็จ');
    }
  }


  public function view_announce(Request $rs)
  {
    $announce = DB::table('announce')
      ->where('id', '=', $rs->id)
      ->first();

    $data = ['status' => 'success', 'data' => $announce];


    return $data;
  }

  public function announce_datatable(Request $rs)
  {

    $get_announce = DB::table('announce')
      ->get();

    $sQuery = Datatables::of($get_announce);
    return $sQuery


      ->addColumn('announce', function ($row) {
        return $row->announce;
      })

      ->addColumn('created_at', function ($row) {


        if ($row->created_at) {
          return date('Y/m/d H:i:s', strtotime($row->created_at));
        } else {
          return '';
        }
      })


      ->addColumn('announce_status', function ($row) {

        if ($row->announce_status == '1') {
          $html = '<span class="badge badge-pill badge-success light">เปิดใช้งาน</span>';
        } elseif ($row->announce_status == '0') {
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


      ->rawColumns(['announce_status', 'action'])

      ->make(true);
  }
}
