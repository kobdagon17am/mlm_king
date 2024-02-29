<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Customer;

use App\Customer_warning;
use App\Modal\Order;
use App\Modal\OrderProductsList;

use App\Customers_address_card;
use App\Customers_address_delivery;
use App\Customers_address_delivery_warning;
use App\Customers_bank;
use App\Customers_bank_warning;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Cart;
class CartSummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {

            $provinces = DB::table('dataset_provinces')
                ->select('*')
                ->where('status','0')
                ->get();


            $get_branch = DB::table('branch')
            ->where('status', 1)
            ->get();

            $cartCollection = Cart::session('1')->getContent();
            $data = $cartCollection->toArray();

            $html = '';

            $quantity = Cart::session('1')->getTotalQuantity();


            if ($data) {
                foreach ($data as $value) {
                    $pv[] = $value['quantity'] * $value['attributes']['pv'];

                }
                $pv_total = array_sum($pv);
            } else {
                $pv_total = 0;
            }

            $shipping = \App\Http\Controllers\Frontend\RegisterController::fc_shipping($pv_total);


            $price = Cart::session('1')->getTotal();
            $price_total = number_format($price+$shipping, 2);

            $user_all =  \App\Http\Controllers\Frontend\FC\UplineAllController::all_upline(Auth::guard('c_user')->user()->username);

            $customers_address_delivery = DB::table('customers_address_delivery')
            ->where('customer_id',Auth::guard('c_user')->user()->id)
            ->first();


            $bill = array('price_total' => $price_total,
                'pv_total' => number_format($pv_total),
                'pv_total_js' => $pv_total,
                'data' => $data,
                'user_all'=>$user_all,
                'shipping'=>$shipping,

                'price_total_not_ship'=>number_format($price),
                'quantity' => $quantity,
                'status' => 'success',

            );

            $data = [  'provinces' => $provinces,'bill'=>$bill,'get_branch'=> $get_branch,'customers_address_delivery'=>$customers_address_delivery];
             return view('frontend.cart_summary', compact('data'));

    }


    public function confirm_cart(Request $rs){

        $insert_db_orders = new Order();
        $insert_order_products_list= new OrderProductsList();
        $quantity = Cart::session('1')->getTotalQuantity();


        $insert_db_orders->quantity = $quantity;
        $insert_db_orders->type = $rs->bill_type;
        $customer_id = Auth::guard('c_user')->user()->id;


        $code_order = \App\Http\Controllers\Frontend\FC\RunCodeController::db_code_order();


        $insert_db_orders->customers_id_fk = $customer_id;

        $user_name = Auth::guard('c_user')->user()->username;




        //$business_location_id = Auth::guard('c_user')->user()->business_location_id;
        $business_location_id = 1;
        $insert_db_orders->business_location_id_fk =  $business_location_id;

        $user_name_send = DB::table('customers')
        ->select('id','username')
        ->where('username',$rs->user_name_send)
        ->first();

        $insert_db_orders->customers_user_name = $user_name;
        $insert_db_orders->customers_send_id_fk = $user_name_send->id;
        $insert_db_orders->customers_user_name_send = $rs->user_name_send;

        if($user_name == $rs->user_name_send){
            $insert_db_orders->status_payment_sent_other = 0;
        }else{
            $insert_db_orders->status_payment_sent_other = 1;

        }


        if($rs->address_type_order == '1'){//ตามที่อยู่ลงทะเบียน

            if(empty($rs->sent_changwat_order_regis) || empty($rs->sent_zipcode_order_regis)){
                $data = ['status'=>'fail','ms'=>'กรุณากรอกที่อยู่ก่อนทำการซื้อสินค้า'];
                return redirect('CartSummary')->withError('กรุณากรอกที่อยู่ก่อนทำการซื้อสินค้า');

            }

            $dataset_changwat = DB::table('dataset_provinces')
            ->select('name_th')
            ->where('id',$rs->sent_changwat_order_regis)
            ->first();


            $dataset_amphuress = DB::table('dataset_amphures')
            ->select('name_th')
            ->where('id',$rs->sent_amphur_order_regis)
            ->first();



            $dataset_tambon = DB::table('dataset_districts')
            ->select('name_th')
            ->where('id',$rs->sent_tambon_order_regis)
            ->first();



            $insert_db_orders->address_sent = 'system';
            $insert_db_orders->delivery_province_id = $rs->sent_changwat_order_regis;
            $insert_db_orders->house_no = $rs->sent_no_order_regis;
            $insert_db_orders->house_name =$rs->sent_homename_order_regis;
            $insert_db_orders->moo = $rs->sent_moo_order_regis;
            $insert_db_orders->soi = $rs->sent_soi_order_regis;
            $insert_db_orders->road = $rs->sent_road_order_regis;
            $insert_db_orders->tambon_id = $rs->sent_tambon_order_regis;
            $insert_db_orders->district_id = $rs->sent_amphur_order_regis;
            $insert_db_orders->province_id = $rs->sent_changwat;
            $insert_db_orders->district = $dataset_amphuress->name_th;
            $insert_db_orders->tambon =$dataset_tambon->name_th;
            $insert_db_orders->province = $dataset_changwat->name_th;
            $insert_db_orders->zipcode = $rs->sent_zipcode_order_regis;
            $insert_db_orders->tel = $rs->sent_phone_order_regis;
            $insert_db_orders->name = $rs->sent_name_order_regis;

        }

        if($rs->address_type_order == '2'){ //รับที่สาขา

            if(empty($rs->sent_branch_order)){
                $data = ['status'=>'fail','ms'=>'กรุณาเลือกสาขา'];
                return redirect('CartSummary')->withError('กรุณาเลือกสาขา');

            }

            $insert_db_orders->address_sent = 'branch';
            $insert_db_orders->sentto_branch_id = $rs->sent_branch_order;
            $insert_db_orders->tel = $rs->same_phone;
            $insert_db_orders->name = Auth::guard('c_user')->user()->first_name.' '. $rs->last_name;
        }



        if($rs->address_type_order == '3'){ //ที่อยู่อื่นๆ

            $dataset_changwat = DB::table('dataset_provinces')
            ->select('name_th')
            ->where('id',$rs->sent_changwat_order)
            ->first();


            $dataset_amphuress = DB::table('dataset_amphures')
            ->select('name_th')
            ->where('id',$rs->sent_amphur_order)
            ->first();



            $dataset_tambon = DB::table('dataset_districts')
            ->select('name_th')
            ->where('id',$rs->sent_tambon_order)
            ->first();



            $insert_db_orders->address_sent = 'other';
            $insert_db_orders->delivery_province_id = $rs->sent_changwat_order;
            $insert_db_orders->house_no = $rs->sent_no_order;
            $insert_db_orders->house_name =$rs->sent_home_name_order;
            $insert_db_orders->moo = $rs->sent_moo_order;
            $insert_db_orders->soi = $rs->sent_soi_order;
            $insert_db_orders->road = $rs->sent_road_order;
            $insert_db_orders->tambon_id = $rs->sent_tambon_order;
            $insert_db_orders->district_id = $rs->sent_amphur_order;
            $insert_db_orders->province_id = $rs->sent_changwat_order;
            $insert_db_orders->district = $dataset_amphuress->name_th;
            $insert_db_orders->tambon = $dataset_tambon->name_th;
            $insert_db_orders->province = $dataset_changwat->name_th;
            $insert_db_orders->zipcode = $rs->sent_zipcode_order;
            $insert_db_orders->tel = $rs->phone_order;
            $insert_db_orders->name = $rs->sent_name_order .' '. $rs->sent_phone_order;
        }


        // เงินโอน
        // บัตรเครดิต
        // PromptPay
        // TrueMoney
        // บัตรเกษตรสุขใจ
        if(empty($rs->pay_type_id)){
            $data = ['status'=>'fail','ms'=>'ไม่พบประเภทการชำระเงิน'];
            return $data;

        }

        // dd($rs->pay_type_id);
        // $insert_db_orders->pay_type_id = $rs->pay_type_id;

        // $pay_type_name = DB::table('dataset_order_pay')
        // ->select('*')
        // ->where('id', '=', $rs->pay_type_id)
        // ->first();

        $insert_db_orders->pay_type_name =  $rs->make_payment;

        // dd($insert_db_orders->toArray());

        // $location = Location::location($business_location_id, $business_location_id);
        // $location = '';
        $cartCollection = Cart::session('1')->getContent();
        $data = $cartCollection->toArray();
        $quantity = Cart::session('1')->getTotalQuantity();

        if($quantity  == 0){
            $resule = ['status' => 'fail', 'ms' => 'ไม่มีสินค้าที่เลือก กรุณาทำรายการไหม่'];
            return $resule;

        }
        $i=0;

        $products_list = array();
        if ($data) {
            foreach ($data as $value) {
                $i++;
                $total_pv = $value['attributes']['pv'] * $value['quantity'];
				$total_price = $value['price'] * $value['quantity'];

                 $products_vat = DB::table('products')
                ->where('id',$value['id'])
                ->where('product_vat','vat')
                ->first();

                if($products_vat){
                    $vat_total =  ($total_price)*7/100;
                }else{
                    $vat_total = 0;
                }

                $insert_db_products_list[] = [
                    'code_order'=>$code_order,
                    'product_id_fk'=>$value['id'],

                    'customers_username' =>  $user_name,
                    'selling_price' =>  $value['price'],
                    'product_name' =>  $value['name'],
                    'amt' =>  $value['quantity'],
                    'amt_out_stock' =>  $value['quantity'],
                    'product_unit_id_fk' => $value['attributes']['product_unit_id'],
                    'product_unit_name' =>$value['attributes']['product_unit_name'],
                    'pv' =>   $value['attributes']['pv'],
                    'total_pv' => $total_pv,
                    'total_price' => $total_price,
                    'vat' =>$vat_total,

                ];
                // $product_id[] = $value['id'];

                $pv[] = $value['quantity'] * $value['attributes']['pv'];
                $vat_total_arr[] = $vat_total;


                // $product_shipping = DB::table('products_cost')
                // ->where('product_id_fk',$value['id'])
                // ->where('status_shipping','Y')
                // ->first();
                // if($product_shipping){
                //     //$pv_shipping_arr[] = $value['quantity'] * $product_shipping->pv;
                //     $pv_shipping_arr[] = $value['quantity'] * 20;
                // }else{
                //     $pv_shipping_arr[] = 0;
                // }

            }
            $vat_total_sum = array_sum($vat_total_arr);
            $pv_total = array_sum($pv);
        } else {
            $vat_total_sum = 0;
            $pv_total = 0;

        }


        //ราคาสินค้า
        $price = Cart::session('1')->getTotal();


       //vatใน 7%

        //มูลค่าสินค้า
        $price_vat = $price-$vat_total_sum;
        $insert_db_orders->product_value = $price_vat;

        $shipping = \App\Http\Controllers\Frontend\RegisterController::fc_shipping($pv_total);
        // $shipping_zipcode = \App\Http\Controllers\Frontend\ShippingController::fc_shipping_zip_code($insert_db_orders->zipcode);
        // $shipping_total = $shipping+$shipping_zipcode['price'];



        if($shipping == 0){
            $insert_db_orders->shipping_free = 1;//ส่งฟรี
            $insert_db_orders->shipping_cost_id_fk = 1;
            $shipping_cost_name = DB::table('dataset_shipping_cost')
            ->where('id',1)
            ->first();


        }else{

                $insert_db_orders->shipping_cost_id_fk = 2;
                $shipping_cost_name = DB::table('dataset_shipping_cost')
                ->where('id',2)
                ->first();

        }
        $insert_db_orders->shipping_cost_name = $shipping_cost_name->shipping_name;

        $insert_db_orders->sum_price = $price_vat;

        $data_user =  DB::table('customers')
        ->select('dataset_qualification.business_qualifications as qualification_name','dataset_qualification.bonus')
        ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=','customers.qualification_id')
        ->where('username','=',Auth::guard('c_user')->user()->username)
        ->first();


        $insert_db_orders->position = $data_user->qualification_name;
        // $insert_db_orders->bonus_percent = $data_user->bonus;

        // $discount = floor($pv_total * $data_user->bonus/100);
        // $insert_db_orders->discount = $discount;
        // $total_price = $price + $shipping_total - $discount;


        $insert_db_orders->shipping_price = $shipping;
        $insert_db_orders->total_price = $price+$shipping;
        $insert_db_orders->pv_total = $pv_total;
        $insert_db_orders->tax_total = $vat_total_sum;
        $insert_db_orders->order_status_id_fk = 9;
        $insert_db_orders->quantity = $quantity ;
        $insert_db_orders->code_order = $code_order;
        $insert_db_orders->phone_pay = $rs->phone_pay;

        $slip_image = $rs->file('slip_image');

        if (isset($slip_image)) {
            $url = 'local/public/files_slip/' . date('Ym');

            $i=0;

              $f_name = date('YmdHis_').''.$i.'_'.$customer_id.'.'.$slip_image->getClientOriginalExtension();

              if ($slip_image->move($url, $f_name)) {
                $insert_db_orders->transfer_price = $price;
                $insert_db_orders->file_slip = $url.'/'.$f_name;

                // DB::table('payment_slip')
                //     ->insert(['customer_id' => $customer_id, 'url' => $url, 'file' => $f_name,'code_order' => $rs->code_order, 'order_id' => $rs->id]);

                // $db_orders = DB::table('db_orders')
                //     ->where('id', $rs->id)
                //     ->update(['order_status_id_fk' => $orderstatus_id,'approve_status'=>1,'transfer_price'=>$rs->total_price,'pay_type_id_fk'=>'1']);
                    $resule = ['status' => 'success', 'message' => 'ชำระเงินแบบโอนชำระสำเร็จ'];
                }


        }



        $file_slip = $rs->file('img_pay');

        // $orderstatus_id = 2;
        if (isset($file_slip)) {
            $url = 'local/public/files_slip/' . date('Ym');

            $i=0;

              $f_name = date('YmdHis_').''.$i.'_'.$customer_id.'.'.$file_slip->getClientOriginalExtension();

              if ($file_slip->move($url, $f_name)) {
                $insert_db_orders->transfer_price = $price;
                $insert_db_orders->img_card = $url.'/'.$f_name;


                // DB::table('payment_slip')
                //     ->insert(['customer_id' => $customer_id, 'url' => $url, 'file' => $f_name,'code_order' => $rs->code_order, 'order_id' => $rs->id]);

                // $db_orders = DB::table('db_orders')
                //     ->where('id', $rs->id)
                //     ->update(['order_status_id_fk' => $orderstatus_id,'approve_status'=>1,'transfer_price'=>$rs->total_price,'pay_type_id_fk'=>'1']);
                    $resule = ['status' => 'success', 'message' => 'ชำระเงินแบบโอนชำระสำเร็จ'];
                }


        }

        $file_slip2 = $rs->file('img_idcard_pay');
        // $orderstatus_id = 2;

        if (isset($file_slip2)) {

            // Your code here
            $url = 'local/public/files_slip_card/' . date('Ym');
            $i=0;
              $i++;
              $f_name = date('YmdHis_').''.$i.'_'.$customer_id.'.'.$file_slip2->getClientOriginalExtension();
              if ($file_slip2->move($url, $f_name)) {
                $insert_db_orders->img_idcard_pay = $url.'/'.$f_name;
                // DB::table('payment_slip')
                //     ->insert(['customer_id' => $customer_id, 'url' => $url, 'file' => $f_name,'code_order' => $rs->code_order, 'order_id' => $rs->id]);

                // $db_orders = DB::table('db_orders')
                //     ->where('id', $rs->id)
                //     ->update(['order_status_id_fk' => $orderstatus_id,'approve_status'=>1,'transfer_price'=>$rs->total_price,'pay_type_id_fk'=>'1']);
                    $resule = ['status' => 'success', 'message' => 'ชำระเงินแบบโอนชำระสำเร็จ'];
                }

        }


        try {
            DB::BeginTransaction();


        $insert_db_orders->save();
        $insert_order_products_list::insert($insert_db_products_list);

         Cart::session('1')->clear();
         $resule = ['status' => 'success', 'ms' => 'Order Success','order_id_fk'=>$insert_db_orders->id,'code_order'=>$code_order];
         DB::commit();

         return redirect('Order')->withSuccess('สั่งซื้อสำเร็จ');



         } catch (\Exception $e) {

        DB::rollback();

        $resule = ['status' => 'fail', 'ms' => $e->getMessage()];
        return redirect('Order')->withError($e->getMessage());
        // return $resule;
        }
    }


}

