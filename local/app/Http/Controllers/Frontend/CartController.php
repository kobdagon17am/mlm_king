<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer');

    }

    public function index()
    {


        $cartCollection = Cart::session(1)->getContent();
        $data = $cartCollection->toArray();


        $quantity = Cart::session(1)->getTotalQuantity();

        if($quantity  == 0){
            return redirect('CartGeneral/general')->withWarning('ไม่มีสินค้าในตะกร้าสินค้า กรุณาเลือกสินค้า');
        }
        if ($data) {
            foreach ($data as $value) {
                $pv[] = $value['quantity'] * $value['attributes']['pv'];

            }

            $pv_total = array_sum($pv);
        } else {
            $pv_total = 0;

        }



        // $data_user =  DB::table('customers')
        // ->select('dataset_qualification.business_qualifications as qualification_name','dataset_qualification.bonus')
        // ->leftjoin('dataset_qualification', 'dataset_qualification.code', '=','customers.qualification_id')
        // ->where('username','=',Auth::guard('c_user')->user()->username)
        // ->first();



        $price = Cart::session(1)->getTotal();
        if($pv_total >= 400){
          $shipping =  0;
        }else{
          $shipping = 50;
        }


        $price_total = number_format($price+$shipping, 2);

        // $discount = floor($pv_total * $data_user->bonus/100);

        $bill = array(
            'price_total' => $price_total,
            'shipping'=>$shipping,
            'pv_total' => $pv_total,
            'data' => $data,
            // 'bonus'=>$data_user->bonus,
            // 'discount'=>$discount,
            // 'position'=>$data_user->qualification_name,
            'quantity' => $quantity,
            'status' => 'success',

        );



        return view('frontend/cart', compact('bill'));
    }


    public function cart_delete(Request $request)
    {
        // dd($request->all());
        Cart::session(1)->remove($request->data_id);
        return redirect('Cart')->withSuccess('นำสินค้าออกจากตะกร้าสำเร็จ');
    }


    public function quantity_change(Request $request){
        if ($request->product_id) {
            Cart::session(1)->update($request->product_id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->productQty,
                ),
            ));
            return redirect('Cart')->withSuccess('แก้ไขจำนวนสำเร็จ');
        }else{
            return redirect('Cart')->withError('ไม่สามารถแก้ไขจำนวนสินค้าได้');

        }


    }


    public function edit_item_register(Request $request)
    {
        $type = $request->type;

        $product = Cart::session($type)->get($request->item_id);

        if ($request->item_id) {

            if (empty($product) and $request->qty > 0) { //เพิ่ม


                    $product_data = DB::table('products')
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
                    ->where('products.id', '=', $request->item_id)
                    ->first();

                    if( Auth::guard('c_user')->user()->business_location_id == 1 || empty(Auth::guard('c_user')->user()->business_location_id) ){
                        $dataset_currency =  1;
                        $price = $product_data->product_price_member;
                      //   $shipping = $product_data->shipping_th  ?? '0';
                    }else{
                        $dataset_currency =  2;
                        $price = $product_data->product_price_member;
                      //   $shipping = $product->shipping_usd  ?? '0';
                    }

                $cart = Cart::session($type)->add(array(
                    'id' => $product_data->products_id, // inique row ID
                    'name' => $product_data->product_name,
                    'price' =>  $price,
                    'quantity' => $request->qty,
                    'attributes' => array(
                        'shipping' => 0,
                        'pv' => $product_data->pv,
                        'img' => asset($product_data->product_image_url . '' . $product_data->product_image_name),
                        'product_unit_id'=>$product_data->product_unit_id_fk,
                        'product_unit_name' => $product_data->product_unit_name,
                        'descriptions' => $product_data->product_detail,
                        // 'promotion_id' => $rs->id,
                        'detail' => '',
                        // 'category_id' => $product->category_id,
                    ),
                ));

            } elseif ($request->qty <= 0 || empty($request->qty)) { //ลบ

                Cart::session($type)->remove($request->item_id);
            } else { //แก้ไข


                Cart::session($type)->update($request->item_id, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->qty,
                    ),
                ));

            }

            $cartCollection = Cart::session($type)->getContent();
            $data = $cartCollection->toArray();

            $quantity = Cart::session($type)->getTotalQuantity();
            if ($data) {
                foreach ($data as $value) {
                    $pv[] = $value['quantity'] * $value['attributes']['pv'];
                }
                $pv_total = array_sum($pv);

            } else {
                $pv_total = 0;
            }

            $price = Cart::session($type)->getTotal();
            $price_total = number_format($price, 2);

            $bill = array('price_total' => $price_total,
                'action_id' => $request->item_id,
                'pv_total' => number_format($pv_total),
                'pv_total_js' => $pv_total,
                'data' => $data,
                'quantity' => $quantity,
                'status' => 'success',
            );

            return $bill;

        } else {
            $bill = array('status' => 'fail');
            return $bill;

        }

    }

}
