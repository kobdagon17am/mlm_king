<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cart;

class CartGeneralController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer');

    }
  public function index($type)
  {


    if($type == 'general'){
        $data = ['12'];

        $get_category = DB::table('categories')
          //->select('categories.*', 'products.*', 'product_images.product_image_url', 'product_images.product_image_name')
          //->leftJoin('products', 'products.product_category_id_fk', '=', 'categories.id')
          //->leftJoin('product_images', 'products.id', '=', 'product_images.product_id_fk')
          ->whereNotin('categories.id',$data)
          ->get();

    }elseif($type == 'stock'){
        $data = ['12'];
        $get_category = DB::table('categories')
          //->select('categories.*', 'products.*', 'product_images.product_image_url', 'product_images.product_image_name')
          //->leftJoin('products', 'products.product_category_id_fk', '=', 'categories.id')
          //->leftJoin('product_images', 'products.id', '=', 'product_images.product_id_fk')
          ->wherein('categories.id',$data)
          ->get();

    }else{
        $data = ['12'];
        $get_category = DB::table('categories')
        //->select('categories.*', 'products.*', 'product_images.product_image_url', 'product_images.product_image_name')
        //->leftJoin('products', 'products.product_category_id_fk', '=', 'categories.id')
        //->leftJoin('product_images', 'products.id', '=', 'product_images.product_id_fk')
        ->whereNotin('categories.id',$data)
        ->get();

    }


    return view('frontend.cart_general', compact('get_category','type'));

  }
  public static function product_detail($c_id){

   // \App\Http\Controllers\Frontend\CartGeneralController::product_detail();
   if($c_id == 1 ){
    $get_product = DB::table('products')
    ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
    ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
    //->where('products.product_category_name', '=', 'คลังเกษตร')
    ->where('product_images.product_image_orderby', '=', '1')
    ->whereNotin('products.product_category_id_fk',['12'])
    ->where('products.status', '=', '1')
    ->get();

   }else{
    $get_product = DB::table('products')
    ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
    ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
    //->where('products.product_category_name', '=', 'คลังเกษตร')
    ->where('product_images.product_image_orderby', '=', '1')
    ->where('products.product_category_id_fk',$c_id)
    ->where('products.status', '=', '1')
    ->get();

   }

      return $get_product;


  }


  public static function product_detail_register($c_id){//1 ทั้วไป 2 คลัง

    // \App\Http\Controllers\Frontend\CartGeneralController::product_detail();
    if($c_id == 1 ){
     $get_product = DB::table('products')
     ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
     ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
     //->where('products.product_category_name', '=', 'คลังเกษตร')
     ->where('product_images.product_image_orderby', '=', '1')
     ->wherein('products.product_category_id_fk',['9','10','11'])
     ->where('products.status', '=', '1')
     ->get();

    }else{
     $get_product = DB::table('products')
     ->select('products.*', 'product_images.product_image_url', 'product_images.product_image_name')
     ->leftJoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
     //->where('products.product_category_name', '=', 'คลังเกษตร')
     ->where('product_images.product_image_orderby', '=', '1')
     ->wherein('products.product_category_id_fk',['12'])
     ->where('products.status', '=', '1')
     ->get();

    }

       return $get_product;


   }

  public function add_cart(Request $rs)
  {

    if($rs->type == 'stock'){
        $cart = 2;
    }else{
        $cart = 1;
    }

      $product = DB::table('products')
      ->select(
          'products.*',
          'products.id as products_id',
          'products.product_pv as pv',
          'product_images.product_image_url',
          'product_images.product_image_name',

          // 'dataset_currency.*',
      )
      ->leftjoin('product_images', 'products.id', '=', 'product_images.product_id_fk')
      ->where('product_images.product_image_orderby', '=', 1)
      ->where('products.id', '=', $rs->id)
      ->first();


          if( Auth::guard('c_user')->user()->business_location_id == 1 || empty(Auth::guard('c_user')->user()->business_location_id) ){
              $dataset_currency =  1;
              $price = $product->product_price_member;
            //   $shipping = $product->shipping_th  ?? '0';
          }else{
              $dataset_currency =  2;
              $price = $product->product_price_member;
            //   $shipping = $product->shipping_usd  ?? '0';
          }



      if ($product) {
          Cart::session($cart)->add(array(
              'id' => $product->products_id, // inique row ID
              'name' => $product->product_name,
              'price' =>  $price,
              'quantity' => $rs->quantity,
              'attributes' => array(
                  'shipping' => 0,
                  'pv' => $product->pv,
                  'img' => asset($product->product_image_url . '' . $product->product_image_name),
                  'product_unit_id'=>$product->product_unit_id_fk,
                  'product_unit_name' => $product->product_unit_name,
                  'descriptions' => $product->product_detail,
                  // 'promotion_id' => $rs->id,
                  'detail' => '',
                  // 'category_id' => $product->category_id,
              ),
          ));

          $getTotalQuantity = Cart::session($cart)->getTotalQuantity();

          // $item = Cart::session($request->type)->getContent();
          $data = ['status' => 'success', 'qty' => $getTotalQuantity];
      } else {
          $data = ['status' => 'fail', 'ms' => 'ไม่พบสินค้าในระบบกรุณาทำรยการไหม่อีกครั้ง'];
      }


      return $data;
  }

}
