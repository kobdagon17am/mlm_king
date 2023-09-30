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
        return redirect('Cart')->withSuccess('Deleted Success'); 
    }
   
}