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
      'promotion_url' => $rs->promotion_url,
      'promotion_price' => $rs->promotion_price,
      'promotion_start_date' => $rs->promotion_start_date,
      'promotion_end_date' => $rs->promotion_end_date,
      'promotion_status' => $rs->promotion_status,
    ];

    // dd($dataPrepare);

    try {
      DB::BeginTransaction();
      $get_promotions = DB::table('promotion')
        ->insertGetId($dataPrepare);


      if (isset($rs->promotion_image1)) {
        $file_1 = $rs->promotion_image1;
        $url = 'local/public/promotions/';

        $f_name = date('YmdHis') . '_1.' . $file_1->getClientOriginalExtension();
        if ($file_1->move($url, $f_name)) {
          $dataPrepare = [
            'promotion_id_fk' => $get_promotions,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name,
            'promotion_image_orderby' => '1',

          ];
          DB::table('promotion_images')
            ->insert($dataPrepare);
        }
      }

      if (isset($rs->promotion_image2)) {
        $file_2 = $rs->promotion_image2;
        $url = 'local/public/promotions/';

        $f_name2 = date('YmdHis') . '_2.' . $file_2->getClientOriginalExtension();
        if ($file_2->move($url, $f_name2)) {
          $dataPrepare = [
            'promotion_id_fk' => $get_promotions,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name2,
            'promotion_image_orderby' => '2',

          ];
          DB::table('promotion_images')
            ->insert($dataPrepare);
        }
      }

      if (isset($rs->promotion_image3)) {
        $file_3 = $rs->promotion_image3;
        $url = 'local/public/promotions/';

        $f_name3 = date('YmdHis') . '_3.' . $file_3->getClientOriginalExtension();
        if ($file_3->move($url, $f_name3)) {
          $dataPrepare = [
            'promotion_id_fk' => $get_promotions,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name3,
            'promotion_image_orderby' => '3',

          ];
          DB::table('promotion_images')
            ->insert($dataPrepare);
        }
      }

      if (isset($rs->promotion_image4)) {
        $file_4 = $rs->promotion_image4;
        $url = 'local/public/promotions/';

        $f_name4 = date('YmdHis') . '_4.' . $file_4->getClientOriginalExtension();
        if ($file_4->move($url, $f_name4)) {
          $dataPrepare = [
            'promotion_id_fk' => $get_promotions,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name4,
            'promotion_image_orderby' => '4',

          ];
          DB::table('promotion_images')
            ->insert($dataPrepare);
        }
      }

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
      'promotion_url' => $rs->promotion_url,
      'promotion_price' => $rs->promotion_price,
      'promotion_start_date' => $rs->promotion_start_date,
      'promotion_end_date' => $rs->promotion_end_date,
      'promotion_status' => $rs->promotion_status,
    ];

    try {
      DB::BeginTransaction();

      $get_promotions = DB::table('promotion')
        ->where('id', '=', $rs->id)
        ->update($dataPrepare);

      if (isset($rs->promotion_image1)) {
        $file_1 = $rs->promotion_image1;
        $url = 'local/public/promotions/';

        $f_name = date('YmdHis') . '_1.' . $file_1->getClientOriginalExtension();
        if ($file_1->move($url, $f_name)) {
          $dataPrepare = [
            'promotion_id_fk' => $rs->id,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name,
            'promotion_image_orderby' => '1',

          ];

          DB::table('promotion_images')
            ->updateOrInsert(
              ['promotion_id_fk' => $rs->id, 'promotion_image_orderby' =>  1],
              $dataPrepare
            );
        }
      }

      if (isset($rs->promotion_image2)) {
        $file_2 = $rs->promotion_image2;
        $url = 'local/public/promotions/';

        $f_name = date('YmdHis') . '_2.' . $file_2->getClientOriginalExtension();
        if ($file_2->move($url, $f_name)) {
          $dataPrepare = [
            'promotion_id_fk' => $rs->id,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name,
            'promotion_image_orderby' => '2',

          ];

          DB::table('promotion_images')
            ->updateOrInsert(
              ['promotion_id_fk' => $rs->id, 'promotion_image_orderby' => 2],
              $dataPrepare
            );
        }
      }

      if (isset($rs->promotion_image3)) {
        $file_3 = $rs->promotion_image3;
        $url = 'local/public/promotions/';

        $f_name3 = date('YmdHis') . '_3.' . $file_3->getClientOriginalExtension();
        if ($file_3->move($url, $f_name3)) {
          $dataPrepare = [
            'promotion_id_fk' => $rs->id,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name3,
            'promotion_image_orderby' => '3',

          ];
          DB::table('promotion_images')
            ->updateOrInsert(
              ['promotion_id_fk' => $rs->id, 'promotion_image_orderby' => 3],
              $dataPrepare
            );
        }
      }

      if (isset($rs->promotion_image4)) {
        $file_4 = $rs->promotion_image4;
        $url = 'local/public/promotions/';

        $f_name4 = date('YmdHis') . '_4.' . $file_4->getClientOriginalExtension();
        if ($file_4->move($url, $f_name4)) {
          $dataPrepare = [
            'promotion_id_fk' => $rs->id,
            'promotion_image_url' => $url,
            'promotion_image_name' => $f_name4,
            'promotion_image_orderby' => '4',

          ];
          DB::table('promotion_images')
            ->updateOrInsert(
              ['promotion_id_fk' => $rs->id, 'promotion_image_orderby' => 4],
              $dataPrepare
            );
        }
      }

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
      ->where('id', '=', $rs->id)
      ->first();

    $img = DB::table('promotion_images')
      ->where('promotion_id_fk', '=', $rs->id)
      ->get();

    $data = ['status' => 'success', 'data' => $promotion, 'img' => $img];


    return $data;
  }

  public function promotion_datatable(Request $rs)
  {

    $get_promotion = DB::table('promotion')
      ->select('promotion.*', 'promotion_images.promotion_image_url', 'promotion_images.promotion_image_name')
      ->leftJoin('promotion_images', 'promotion_images.promotion_id_fk', '=', 'promotion.id')
      ->where('promotion_images.promotion_image_orderby', '=', '1')
      ->get();

    $sQuery = Datatables::of($get_promotion);
    return $sQuery


      ->addColumn('promotion_name', function ($row) {
        return $row->promotion_name;
      })

      ->addColumn('promotion_type', function ($row) {
        if ($row->promotion_type == 'General') {
          $html = '<span class="badge outline-badge-info">สินค้าทั่วไป</span>';
        } elseif ($row->promotion_type == 'Warehouse') {
          $html = '<span class="badge outline-badge-warning">เปิดคลังใบหยก</span>';
        } else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('promotion_detail', function ($row) {
        return $row->promotion_detail;
      })

      ->addColumn('promotion_price', function ($row) {
        return $row->promotion_price;
      })

      ->addColumn('promotion_image', function ($row) {
        $html = '<img src="' . asset($row->promotion_image_url . '' . $row->promotion_image_name) . '"
            alt="contact-img" title="contact-img" class=".avatar-xl mr-3" height="100"
            width="100" style="object-fit: cover;">';

        return $html;
      })



      ->addColumn('promotion_start_date', function ($row) {


        if ($row->promotion_start_date) {
          return date('Y/m/d H:i:00', strtotime($row->promotion_start_date));
        } else {
          return '';
        }
      })

      ->addColumn('promotion_end_date', function ($row) {


        if ($row->promotion_end_date) {
          return date('Y/m/d H:i:00', strtotime($row->promotion_end_date));
        } else {
          return '';
        }
      })

      ->addColumn('promotion_status', function ($row) {

        if ($row->promotion_status == '1') {
          $html = '<span class="badge badge-pill badge-success light">เปิดใช้งาน</span>';
        } elseif ($row->promotion_status == '0') {
          $html = '<span class="badge badge-pill badge-danger light">ปิดใช้งาน</span>';
        } 
        elseif ($row->promotion_status == '2') {
          $html = '<span class="badge badge-pill bg-light-dark light">กำลังดำเนินการ</span>';
        } 
        else {
          $html = '';
        }

        return  $html;
      })

      ->addColumn('action', function ($row) {
        $html = "<a href='" . route('admin/PromotionProducts') . "' onclick='edit(" . $row->id . ")' class='p-2'>
        <i class='las la-plus-circle font-25 text-info'></i></a>";
        $html1 = '<a href="#!" onclick="edit(' . $row->id . ')" class="p-2">
              <i class="lab la-whmcs font-25 text-warning"></i></a>';
        
        return $html . $html1;
      })


      ->rawColumns(['promotion_image', 'promotion_type', 'promotion_status', 'action'])

      ->make(true);
  }
}
