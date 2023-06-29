<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartGeneralController extends Controller
{
  public function index()
  {
    // dd('111');

    $get_category = DB::table('categories')

      // ->where('username','=',Auth::guard('c_user')->user()->username)
      // ->where('password','=',md5($req->password))
      // ->first();
      // ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
      // ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
      // ->where('products.product_category_name', '=', 'เกษตร')
      // ->where('product_images.product_image_orderby', '=', '1')
      ->get();

    $get_product = DB::table('products')
      ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
      ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
      //->where('products.product_category_name', '=', 'คลังเกษตร')
      ->where('product_images.product_image_orderby', '=', '1')
      ->get();

    return view('frontend.cart_general', compact('get_category', 'get_product'));
  }
}
