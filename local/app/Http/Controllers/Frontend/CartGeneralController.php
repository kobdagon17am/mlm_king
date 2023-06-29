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

   //$product =\App\Http\Controllers\Frontend\CartGeneralController::product_detail(9);
   //dd($product);

    $get_category = DB::table('categories')
      //->select('categories.*', 'products.*', 'product_images.product_image_url', 'product_images.product_image_name')
      //->leftJoin('products', 'products.product_category_id_fk', '=', 'categories.id')
      //->leftJoin('product_images', 'products.id', '=', 'product_images.product_id_fk')
      //->where('product_images.product_image_orderby', '=', '1')
      ->get();


// dd($get_category);

    // $get_product = DB::table('products')
    //   ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
    //   ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
    //   //->where('products.product_category_name', '=', 'คลังเกษตร')
    //   ->where('product_images.product_image_orderby', '=', '1')
    //   ->get();

    return view('frontend.cart_general', compact('get_category'));
  }
  public static function product_detail($c_id){

   // \App\Http\Controllers\Frontend\CartGeneralController::product_detail();
    $get_product = DB::table('products')
      ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
      ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
      //->where('products.product_category_name', '=', 'คลังเกษตร')
      ->where('product_images.product_image_orderby', '=', '1')
      ->where('products.product_category_id_fk', '=',$c_id)
      ->get();

      return $get_product;


  }
}
