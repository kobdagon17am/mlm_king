<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cart;
use App\Customer;
use App\Customers_address_card;
use App\Customers_address_delivery;
use Illuminate\Support\Facades\Validator;
use DataTables;
use PDF;

class OrderController extends Controller
{


    public function __construct()
    {
        $this->middleware('customer');

    }

  public function index()
  {

    return view('frontend.order');

  }

  public function order_detail($code)
  {

    $order = DB::table('db_orders')
    ->select(
      'db_orders.*',
      'dataset_order_status.detail',
      'dataset_order_status.css_class'
      )

    ->leftjoin('dataset_order_status', 'dataset_order_status.orderstatus_id', '=', 'db_orders.order_status_id_fk')
    ->where('customers_user_name',Auth::guard('c_user')->user()->username)
    ->where('db_orders.code_order',$code)
    ->first();


    $db_order_products_list = DB::table('db_order_products_list')
    ->select('db_order_products_list.*','product_images.product_image_url','product_images.product_image_name')
    ->leftjoin('product_images', 'product_images.product_id_fk', 'db_order_products_list.product_id_fk')
    ->where('product_images.product_image_orderby', 1)
    ->where('code_order', $code)

    ->get();




    return view('frontend.order_detail',compact('order','db_order_products_list'));

  }

  public function order_list_number($list_id)
  {



    $db_order_products_list = DB::table('db_order_products_list')
    ->select('db_order_products_list.*','product_images.product_image_url','product_images.product_image_name')
    ->leftjoin('product_images', 'product_images.product_id_fk', 'db_order_products_list.product_id_fk')
    ->where('product_images.product_image_orderby', 1)
    ->where('db_order_products_list.customers_username',Auth::guard('c_user')->user()->username)
    ->where('db_order_products_list.id',$list_id)
    ->first();


    if(empty($db_order_products_list)){
        return redirect('Order')->withError('ไม่พบข้อมูลใบเสร็จ');
    }

    $db_order_products_list_number = DB::table('db_order_products_list_number')
    ->where('db_order_products_list_number.customers_username',Auth::guard('c_user')->user()->username)
    ->where('db_order_products_list_number.products_list_id_fk',$list_id)
    ->get();

    if(count($db_order_products_list_number)<=0){
        return redirect('Order')->withError('ไม่พบเลขบิล หาสั่งจองหุ้นในวันนี้จะได้รับเลขการจองในวันถัดไป');
    }

    return view('frontend.order_list_number',compact('db_order_products_list','db_order_products_list_number'));

  }

  public function order_datatable(Request $rs)
  {

      $db_orders = DB::table('db_orders')
      ->select(
        'db_orders.*',
        'dataset_order_status.detail',
        'dataset_order_status.css_class'
        )

      ->leftjoin('dataset_order_status', 'dataset_order_status.orderstatus_id', '=', 'db_orders.order_status_id_fk')

      ->whereRaw(("case WHEN  '{$rs->order_status_id_fk}' != ''  THEN  db_orders.order_status_id_fk = '{$rs->order_status_id_fk}' else 1 END"))
      ->whereRaw(("case WHEN  '{$rs->code_order}' != ''  THEN  db_orders.code_order = '{$rs->code_order}' else 1 END"))
      ->where('customers_user_name',Auth::guard('c_user')->user()->username)
      ->orwhere('customers_user_name_send',Auth::guard('c_user')->user()->username)
      ->orderByDesc('db_orders.id');


    $sQuery = Datatables::of($db_orders);
    return $sQuery


    ->addColumn('created_at', function ($row) {
        $time = date('d/m/Y H:i:s', strtotime($row->created_at));

        return $time;

      })

      ->addColumn('quantity', function ($row) {
        return number_format($row->quantity); // รวมค่า $html และ $html1 ด้วยเครื่องหมาย .

      })


      ->addColumn('total_price', function ($row) {
        return number_format($row->total_price,2); // รวมค่า $html และ $html1 ด้วยเครื่องหมาย .

      })



    ->addColumn('order_status_id_fk', function ($row) {

            $html = '<span class="badge badge-pill badge-'.$row->css_class.' light">'.$row->detail.'</span>';


        return  $html; // รวมค่า $html และ $html1 ด้วยเครื่องหมาย .

      })


    ->addColumn('action', function ($row) {
        $url = route('order_detail',['code'=>$row->code_order]);
            $html = '<a href="'.$url.'"class="p-2">
            <i class="las la-sign-in-alt font-25 text-success"></i></a>';


      return $html; // รวมค่า $html และ $html1 ด้วยเครื่องหมาย .

    })

      ->rawColumns(['customer_status', 'action','order_status_id_fk'])

      ->make(true);
  }

  public function export_pdf_history($id)
  {

      // <a target="_blank" href="{{route('admin/export_pdf_history',['code'=>$order->code_order])}}"class="p-2">
      // <i class="las la-print font-30 text-primary"></i></a>


          $order = DB::table('db_orders')
          ->select(
          'db_orders.*',
          'dataset_order_status.detail',
          'dataset_order_status.css_class'
          )

          ->leftjoin('dataset_order_status', 'dataset_order_status.orderstatus_id', '=', 'db_orders.order_status_id_fk')
          ->where('db_orders.id',$id)
          ->first();

          $db_order_products_list = DB::table('db_order_products_list')
          ->select('db_order_products_list.*')
          ->where('code_order', $order->code_order)
          ->get();

          if (!empty($order)) {
              //return view('frontend.pdf.payment', compact('order', 'order_items'));
              $pdf = PDF::loadView('frontend/PDF/view_detail_oeder_pdf',compact('order','db_order_products_list'));
              //   return view('frontend.pdf.payment',compact('data'));
              //   // return $pdf->download('cover_sheet.pdf'); // โหลดทันที
              return $pdf->stream('order_'.$order->code_order.'.pdf'); // เปิดไฟลฺ์
          } else {
              return redirect('Order')->withError('ไม่พบข้อมูลใบเสร็จ');
          }


  }





}
