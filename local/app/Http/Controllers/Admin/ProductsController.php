<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
  public function index()
  {
    // dd('111');

    $get_products = DB::table('products')
      // ->where('username','=',Auth::guard('c_user')->user()->username)
      // ->where('password','=',md5($req->password))
      // ->first();
      ->get();
    return view('backend/products', compact('get_products'));


        ;
  }
  public function insert(Request $rs)
  {
     dd($rs->all());

    $dataPrepare = [
      'product_code' => $rs->product_code,
      'product_name' => $rs->product_name,
      'product_category_name' => $rs->product_category_name,
      'product_detail' => $rs->product_detail,
      'product_amount' => $rs->product_amount,
      'product_unit_name' => $rs->product_unit_name,
      'product_cost' => $rs->product_cost,
      'product_price_member' => $rs->product_price_member,
      'product_discount_percent' => $rs->product_discount_percent,
      'product_discount' => $rs->product_discount,
      'product_pv' => $rs->product_pv,
      'status' => $rs->product_status,
    ];

    try {
      DB::BeginTransaction();
      $get_products = DB::table('products')
        ->insert($dataPrepare);
      DB::commit();
      return redirect('admin/Products')->withSuccess('เพิ่มสินค้าสำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Products')->withError('เพิ่มสินค้าไม่สำเร็จ');
  
    }

    // dd('success');

  }
  public function edit_products(Request $rs)
  {
    // dd($rs->all());

    $dataPrepare = [
      'product_code' => $rs->product_code,
      'product_name' => $rs->product_name,
      'product_category_name' => $rs->product_category_name,
      'product_detail' => $rs->product_detail,
      'product_amount' => $rs->product_amount,
      'product_unit_name' => $rs->product_unit_name,
      'product_cost' => $rs->product_cost,
      'product_price_member' => $rs->product_price_member,
      'product_discount_percent' => $rs->product_discount_percent,
      'product_discount' => $rs->product_discount,
      'product_pv' => $rs->product_pv,
      'status' => $rs->product_status,
    ];

    try {
      DB::BeginTransaction();
      $get_products = DB::table('products')
      ->where('id','=',$rs->id)
        ->update($dataPrepare);
      DB::commit();
      return redirect('admin/Products')->withSuccess('แก้ไขข้อมูลสำเร็จ');
    } catch (Exception $e) {
      DB::rollback();
      return redirect('admin/Products')->withError('แก้ไขข้อมูลไม่สำเร็จ');
      
    }

    

  }

  public function view_products(Request $rs)
  {
     $products = DB::table('products')
     ->where('id','=',$rs->id)
     ->first();

     $data = ['status' => 'success', 'data' => $products];

 
     return $data;
  
  }
}
