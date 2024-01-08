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
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index($user_name, $line_type,$type)
    {




        if (empty($user_name) || empty($line_type)) {
            return redirect('tree')->withError('กรุณาเลือกตำแหน่งที่ต้องการ Add User');
        } else {
            $resule = DB::table('customers')
                ->select('*')
                ->where('username', '=', $user_name)
                ->first();


            $provinces = DB::table('dataset_provinces')
                ->select('*')
                ->where('status','0')
                ->get();

            $dataset_bank = DB::table('dataset_bank')
                ->select('*')
                ->where('status','1')
                ->get();



            $get_branch = DB::table('branch')
            ->where('status', 1)
            ->get();




            if (Auth::guard('c_user')->user()->business_location_id  == '1' || Auth::guard('c_user')->user()->business_location_id  == null) {
                $business_location_id = 1;
            } else {
                $business_location_id = 3;
            }
            $business_location = DB::table('dataset_business_location')
                ->select('*')
                ->where('lang_id', '=', 1)
                ->where('status', '=', 1)
                ->orderby('id')
                ->get();


            $country = DB::table('dataset_business_location')
                ->select('*')
                ->where('lang_id', '=', 1)
                ->orderby('id')
                ->get();



            $cartCollection = Cart::session('register')->getContent();
            $data = $cartCollection->toArray();

            $html = '';

            $quantity = Cart::session('register')->getTotalQuantity();


            if ($data) {
                foreach ($data as $value) {
                    $pv[] = $value['quantity'] * $value['attributes']['pv'];

                }
                $pv_total = array_sum($pv);
            } else {
                $pv_total = 0;
            }

            $price = Cart::session('register')->getTotal();
            $price_total = number_format($price, 2);

            $bill = array('price_total' => $price_total,
                'pv_total' => number_format($pv_total),
                'pv_total_js' => $pv_total,
                'data' => $data,
                'quantity' => $quantity,
                'status' => 'success',

            );



            $data = ['data' => $resule, 'line_type_back' => $line_type, 'provinces' => $provinces, 'business_location' => $business_location,
             'country' => $country,'bill'=>$bill,'type'=>$type,'get_branch'=> $get_branch,'dataset_bank'=>$dataset_bank];

            return view('frontend/register', compact('data'));
        }
    }


    public function member_register(Request $request)
    {
        //  dd('1');

        //return response()->json(['status' => 'fail', 'ms' => 'ลงทะเบียนไม่สำเร็จกรุณาลงทะเบียนไหม่sss']);

        //BEGIN data validator
        $rule = [
            // BEGIN ข้อมูลส่วนตัว
            'upline_id' => 'required',
            // 'sponsor' => 'required',
            'side' => 'required',
            'number_of_member' => 'required',
            'business_location' => 'required',
            'prefix' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'marital_status' => 'required',
            'businessname' => 'required',
            'birthdate' => 'required|date',
            'id_card' => 'required|min:13|unique:customers',
            'country' => 'required',
            'national' => 'required',
            'phone' => 'required|numeric',
            // 'email' => 'required|email',
            // END ข้อมูลส่วนตัว

            // BEGIN ที่อยู่ตามบัตรประชาชน
            // 'file_card' => 'required|mimes:jpeg,jpg,png',
            // 'card_no' => 'required',
            // 'card_moo' => 'required',
            // 'card_home_name' => 'required',
            // 'card_tambon' => 'required',
            // 'card_amphur' => 'required',
            // 'card_changwat' => 'required',
            // 'card_zipcode' => 'required',
            // END ที่อยู่ตามบัตรประชาชน

            //  BEGIN ที่อยู่จัดส่ง
            'sent_no' => 'required',
            'sent_moo' => 'required',
            'sent_home_name' => 'required',

            'sent_tambon' => 'required',
            'sent_amphur' => 'required',
            'sent_changwat' => 'required',
            'sent_zipcode' => 'required',
            // END ที่อยู่จัดส่ง

            //  BEGIN ข้อมูลบัญชี

            // END ข้อมูลบัญชี

        ];

        $message = [
            // BEGIN ข้อมูลส่วนตัว
            'upline_id.required' => 'กรุณากรอกข้อมูล',
            'sponsor.required' => 'กรุณากรอกข้อมูล',
            'side.required' => 'กรุณากรอกข้อมูล',
            'number_of_member.required' => 'กรุณากรอกข้อมูล',
            'business_location.required' => 'กรุณากรอกข้อมูล',
            'prefix.required' => 'กรุณากรอกข้อมูล',
            'firstname.required' => 'กรุณากรอกข้อมูล',
            'lastname.required' => 'กรุณากรอกข้อมูล',
            'marital_status.required' => 'กรุณากรอกข้อมูล',
            'businessname.required' => 'กรุณากรอกข้อมูล',
            'birthdate.required' => 'กรุณากรอกข้อมูล',
            'birthdate.date_format' => 'กรุณากรอกวันที่ในรูปแบบ YYYY-MM-DD',
            'id_card.required' => 'กรุณากรอกข้อมูล',
            'id_card.min' => 'กรุณากรอกให้ครบ 13 หลัก',
            'id_card.unique' => 'เลขบัตรนี้ถูกใช้งานแล้ว',
            'country.required' => 'กรุณากรอกข้อมูล',
            'national.required' => 'กรุณากรอกข้อมูล',
            'phone.required' => 'กรุณากรอกข้อมูล',
            'phone.numeric' => 'เป็นตัวเลขเท่านั้น',
            // 'email.required' => 'กรุณากรอกข้อมูล',
            // 'email.email' => 'กรุณากรอกอีเมล์',
            // END ข้อมูลส่วนตัว

            // BEGIN ที่อยู่ตามบัตรประชาชน
            // 'card_no.required' => 'กรุณากรอกข้อมูล',
            // 'card_moo.required' => 'กรุณากรอกข้อมูล',
            // 'card_home_name.required' => 'กรุณากรอกข้อมูล',


            // 'card_tambon.required' => 'กรุณากรอกข้อมูล',
            // 'card_amphur.required' => 'กรุณากรอกข้อมูล',
            // 'card_changwat.required' => 'กรุณากรอกข้อมูล',
            // 'card_zipcode.required' => 'กรุณากรอกข้อมูล',
            // END ที่อยู่ตามบัตรประชาชน

            // BEGIN ที่อยู่จัดส่ง
            'sent_no.required' => 'กรุณากรอกข้อมูล',
            'sent_moo.required' => 'กรุณากรอกข้อมูล',
            'sent_home_name.required' => 'กรุณากรอกข้อมูล',


            'sent_tambon.required' => 'กรุณากรอกข้อมูล',
            'sent_amphur.required' => 'กรุณากรอกข้อมูล',
            'sent_changwat.required' => 'กรุณากรอกข้อมูล',
            'sent_zipcode.required' => 'กรุณากรอกข้อมูล',
            // END ที่อยู่จัดส่ง




        ];


        // if ($request->file_bank) {

        //     $rule['file_bank'] = 'mimes:jpeg,jpg,png';
        //     $message_err['file_bank.mimes'] = 'รองรับไฟล์นามสกุล jpeg,jpg,png เท่านั้น';

        //     $rule['bank_name'] = 'required';
        //     $message_err['bank_name.required'] = 'กรุณากรอกข้อมูล';

        //     $rule['bank_branch'] = 'required';
        //     $message_err['bank_branch.required'] = 'กรุณากรอกข้อมูล';

        //     $rule['bank_no'] = 'required|numeric';
        //     $message_err['bank_no.required'] = 'กรุณากรอกข้อมูล';
        //     $message_err['bank_no.numeric'] = 'ใส่เฉพาะตัวเลขเท่านั้น';

        //     $rule['account_name'] = 'required';
        //     $message_err['account_name.required'] = 'กรุณากรอกข้อมูล';
        // }



        $validator = Validator::make(
            $request->all(),
            $rule,
            $message
        );


        //END data validator

        if (!$validator->fails()) {

            //INSERT CUSTOMER

            if($request->number_of_member == 1){

            $user_name = self::gencode_customer();
            $c_code = $user_name;

            $count_user = DB::table('customers')
              ->select('id')
              ->where('username', '=', $c_code)
              ->count();


            if ($count_user > 0) {
              $data = ['status' => 'fail', 'massage' => 'Username or MobileNumber already exists in the system.'];
              return redirect('tree/')->withError('เกิดข้อผิดพลาดรหัสสมาชิกซ้ำในระบบ กรุณาทำรายการไหม่อีกครั้ง');
            }

                $customer_insert = new Customer_warning;
                $customer_insert->username = $c_code;
                $user_name_success[] = $c_code;

                $id_card = (trim($request->input('id_card')) == '') ? null : $request->input('id_card');
                $pass = substr($id_card, -4);
                $pass_db = md5($pass);


                $customer_insert->password = $pass_db;
                $customer_insert->password_real = $pass;
                $customer_insert->upline_id = $request->upline_id;
                $customer_insert->introduce_id = $request->sponsor;
                $customer_insert->line_type = $request->side;
                // $customer_insert->number_of_member=$request->number_of_member;
                // $customer_insert->business_location=$request->business_location;
                $customer_insert->prefix_name = trim($request->prefix);
                $customer_insert->first_name = trim($request->firstname);
                $customer_insert->last_name = trim($request->lastname);
                $customer_insert->marital_status = trim($request->marital_status);
                $customer_insert->business_name = trim($request->businessname);
                $customer_insert->birth_day = trim($request->birthdate);
                $customer_insert->id_card = trim($request->id_card);
                $customer_insert->country = trim($request->country);
                $customer_insert->national = trim($request->national);
                $customer_insert->phone = trim($request->phone);
                $customer_insert->email = trim($request->email);



                //INSERT CUSTOMER ADDRESS CARD
                // $customers_address_card_insert = new Customers_address_card_warning;
                // $customers_address_card_insert->card_house_no = trim($request->card_no);
                // $customers_address_card_insert->card_moo = trim($request->card_moo);
                // $customers_address_card_insert->card_home_name = trim($request->card_home_name);
                // $customers_address_card_insert->card_soi = trim($request->card_soi);
                // $customers_address_card_insert->card_road = trim($request->card_road);
                // $customers_address_card_insert->card_tambon_id_fk = '1';
                // $customers_address_card_insert->card_tambon = trim($request->card_tambon);
                // $customers_address_card_insert->card_district_id_fk = '1';
                // $customers_address_card_insert->card_amphur = trim($request->card_amphur);
                // $customers_address_card_insert->card_province_id_fk = '1';
                // $customers_address_card_insert->card_changwat = trim($request->card_changwat);
                // $customers_address_card_insert->card_zipcode = trim($request->card_zipcode);


                //INSERT CUSTOMER ADDRESS DELIVERY
                $customers_address_delivery_insert = new Customers_address_delivery_warning;
                $customers_address_delivery_insert->sent_no = trim($request->sent_no);
                $customers_address_delivery_insert->sent_moo = trim($request->sent_moo);
                $customers_address_delivery_insert->sent_home_name = trim($request->sent_home_name);
                $customers_address_delivery_insert->sent_soi = trim($request->sent_soi);
                $customers_address_delivery_insert->sent_road = trim($request->sent_road);
                $customers_address_delivery_insert->sent_tambon_id_fk = '1';
                $customers_address_delivery_insert->sent_tambon = trim($request->sent_tambon);
                $customers_address_delivery_insert->sent_district_id_fk = '1';
                $customers_address_delivery_insert->sent_district = trim($request->sent_amphur);
                $customers_address_delivery_insert->sent_province_id_fk = '1';
                $customers_address_delivery_insert->sent_province = trim($request->sent_changwat);
                $customers_address_delivery_insert->sent_zipcode = trim($request->sent_zipcode);


                //INSERT CUSTOMER BANK ACCOUNT
                $customers_bank_insert = new Customers_bank_warning;
                $customers_bank_insert->account_name = trim($request->acc_name);
                $customers_bank_insert->account_no = trim($request->acc_no);
                $customers_bank_insert->bank_id_fk = '1';
                $customers_bank_insert->bank_name = trim($request->bank_name);
                $customers_bank_insert->bank_code = trim($request->bank_code);
                $customers_bank_insert->bank_branch = trim($request->bank_branch);
                $customers_bank_insert->bank_type = trim($request->bank_type);
            }else{

                for ($i = 0; $i < 3; $i++) {

                        $user_name = self::gencode_customer();
                        $c_code = $user_name;

                        $count_user = DB::table('customers')
                        ->select('id')
                        ->where('username', '=', $c_code)
                        ->count();


                        if ($count_user > 0) {
                        $data = ['status' => 'fail', 'massage' => 'Username or MobileNumber already exists in the system.'];
                        return redirect('tree/')->withError('เกิดข้อผิดพลาดรหัสสมาชิกซ้ำในระบบ กรุณาทำรายการไหม่อีกครั้ง');
                        }
                        $user_name_success[] = $c_code;

                    $customer_insert[$i] = new Customer;
                    $customer_insert[$i]->username = $c_code;

                    $id_card = (trim($request->input('id_card')) == '') ? null : $request->input('id_card');
                    $pass = substr($id_card, -4);
                    $pass_db = md5($pass);


                    $customer_insert[$i]->password = $pass_db;
                    $customer_insert[$i]->password_real = $pass;

                    $customer_insert[$i]->introduce_id = $request->sponsor;

                    // $customer_insert[$i]->number_of_member=$request->number_of_member;
                    // $customer_insert[$i]->business_location=$request->business_location;
                    $customer_insert[$i]->prefix_name = trim($request->prefix);
                    if($i == 0){
                        $customer_insert[$i]->first_name = trim($request->firstname);
                        $customer_insert[$i]->line_type = $request->side;
                        $customer_insert[$i]->upline_id = $request->upline_id;
                    }else{
                        $customer_insert[$i]->first_name = trim($request->firstname).'('.$i.')';
                        $customer_insert[$i]->upline_id =  $customer_insert[0]->username;
                        if($i == 1){
                            $customer_insert[$i]->line_type = 'A';

                        }
                        if($i == 2){
                            $customer_insert[$i]->line_type = 'B';
                        }

                    }

                    $customer_insert[$i]->last_name = trim($request->lastname);
                    $customer_insert[$i]->marital_status = trim($request->marital_status);
                    $customer_insert[$i]->business_name = trim($request->businessname);
                    $customer_insert[$i]->birth_day = trim($request->birthdate);
                    $customer_insert[$i]->id_card = trim($request->id_card);
                    $customer_insert[$i]->country = trim($request->country);
                    $customer_insert[$i]->national = trim($request->national);
                    $customer_insert[$i]->phone = trim($request->phone);
                    $customer_insert[$i]->email = trim($request->email);



                    //INSERT CUSTOMER ADDRESS CARD
                    // $customers_address_card_insert[$i] = new Customers_address_card_warning;
                    // $customers_address_card_insert[$i]->card_house_no = trim($request->card_no);
                    // $customers_address_card_insert[$i]->card_moo = trim($request->card_moo);
                    // $customers_address_card_insert[$i]->card_home_name = trim($request->card_home_name);
                    // $customers_address_card_insert[$i]->card_soi = trim($request->card_soi);
                    // $customers_address_card_insert[$i]->card_road = trim($request->card_road);
                    // $customers_address_card_insert[$i]->card_tambon_id_fk = '1';
                    // $customers_address_card_insert[$i]->card_tambon = trim($request->card_tambon);
                    // $customers_address_card_insert[$i]->card_district_id_fk = '1';
                    // $customers_address_card_insert[$i]->card_amphur = trim($request->card_amphur);
                    // $customers_address_card_insert[$i]->card_province_id_fk = '1';
                    // $customers_address_card_insert[$i]->card_changwat = trim($request->card_changwat);
                    // $customers_address_card_insert[$i]->card_zipcode = trim($request->card_zipcode);


                    //INSERT CUSTOMER ADDRESS DELIVERY
                    $customers_address_delivery_insert[$i] = new Customers_address_delivery_warning;
                    $customers_address_delivery_insert[$i]->sent_no = trim($request->sent_no);
                    $customers_address_delivery_insert[$i]->sent_moo = trim($request->sent_moo);
                    $customers_address_delivery_insert[$i]->sent_home_name = trim($request->sent_home_name);
                    $customers_address_delivery_insert[$i]->sent_soi = trim($request->sent_soi);
                    $customers_address_delivery_insert[$i]->sent_road = trim($request->sent_road);
                    $customers_address_delivery_insert[$i]->sent_tambon_id_fk = '1';
                    $customers_address_delivery_insert[$i]->sent_tambon = trim($request->sent_tambon);
                    $customers_address_delivery_insert[$i]->sent_district_id_fk = '1';
                    $customers_address_delivery_insert[$i]->sent_district = trim($request->sent_amphur);
                    $customers_address_delivery_insert[$i]->sent_province_id_fk = '1';
                    $customers_address_delivery_insert[$i]->sent_province = trim($request->sent_changwat);
                    $customers_address_delivery_insert[$i]->sent_zipcode = trim($request->sent_zipcode);


                    //INSERT CUSTOMER BANK ACCOUNT
                    $customers_bank_insert[$i] = new Customers_bank_warning;
                    $customers_bank_insert[$i]->account_name = trim($request->acc_name);
                    $customers_bank_insert[$i]->account_no = trim($request->acc_no);
                    $customers_bank_insert[$i]->bank_id_fk = '1';
                    $customers_bank_insert[$i]->bank_name = trim($request->bank_name);
                    $customers_bank_insert[$i]->bank_code = trim($request->bank_code);
                    $customers_bank_insert[$i]->bank_branch = trim($request->bank_branch);
                    $customers_bank_insert[$i]->bank_type = trim($request->bank_type);

                }

            }



            try {
                if($request->number_of_member == 1){
                    DB::BeginTransaction();

                    $rs_order = RegisterController::payment_submit($request);


                    if($rs_order['status'] == 'success'){

                        $customer_insert->order_id_fk = $rs_order['order_id_fk'];
                        $customer_insert->code_order = $rs_order['code_order'];
                    }else{
                        DB::rollback();
                        return redirect()->back()->withErrors($validator)->withInput()->with('error', $rs_order['ms'] );
                    }

                    $customer_insert->save();
                    // dd($customer_insert);
                    // $customers_address_card_insert->customer_id = $customer_insert->id;
                    // $customers_address_card_insert->username = $customer_insert->username;
                    $customers_address_delivery_insert->customer_id = $customer_insert->id;
                    $customers_address_delivery_insert->username = $customer_insert->username;
                    $customers_address_delivery_insert->sent_phone = $customer_insert->phone;
                    $customers_bank_insert->customer_id = $customer_insert->id;
                    $customers_bank_insert->username = $customer_insert->username;
                    // $customers_address_card_insert->save();
                    $customers_address_delivery_insert->save();
                    $customers_bank_insert->save();

                    if($rs_order['status'] == 'success'){

                        DB::commit();
                        return redirect('RegisterSuccess/'.$id_card)->withSuccess('สมัครสมาชิกสำเร็จ รอการตรวจสอบจาก Admin');
                    }else{
                        DB::rollback();
                        return redirect()->back()->withErrors($validator)->withInput()->with('error', $rs_order['ms'] );
                    }





            }else{

                $rs_order = RegisterController::payment_submit($request);




                for ($i = 0; $i < 3; $i++) {
                    DB::BeginTransaction();

                    if($rs_order['status'] == 'success'){

                        $customer_insert[$i]->order_id_fk =$rs_order['order_id_fk'];
                        $customer_insert[$i]->code_order =$rs_order['code_order'];
                    }else{
                        DB::rollback();
                        return redirect()->back()->withErrors($validator)->withInput()->with('error', $rs_order['ms'] );
                    }


                    $customer_insert[$i]->save();
                    // dd($customer_insert);
                    // $customers_address_card_insert[$i]->customer_id = $customer_insert[$i]->id;
                    // $customers_address_card_insert[$i]->username = $customer_insert[$i]->username;
                    $customers_address_delivery_insert[$i]->customer_id = $customer_insert[$i]->id;
                    $customers_address_delivery_insert[$i]->username = $customer_insert[$i]->username;
                    $customers_address_delivery_insert[$i]->sent_phone = $customer_insert[$i]->phone;
                    $customers_bank_insert[$i]->customer_id = $customer_insert[$i]->id;
                    $customers_bank_insert[$i]->username = $customer_insert[$i]->username;
                    // $customers_address_card_insert[$i]->save();
                    $customers_address_delivery_insert[$i]->save();
                    $customers_bank_insert[$i]->save();

                }


                if($rs_order['status'] == 'success'){


                    DB::commit();
                    return redirect('RegisterSuccess/'.$id_card)->withSuccess('สมัครสมาชิกสำเร็จ รอการตรวจสอบจาก Admin');
                }else{
                    DB::rollback();
                    return redirect()->back()->withErrors($validator)->withInput()->with('error', $rs_order['ms'] );
                }
            }


                // dd($customer_insert);


            } catch (Exception $e) {
                //code
                DB::rollback();
            }
        } else {

            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'กรุณากรอกข้อมูลให้ครบถ้วน');
        }
    }


    public function payment_submit($rs)
    {


        $insert_db_orders = new Order();
        $insert_order_products_list= new OrderProductsList();




        $quantity = Cart::session('register')->getTotalQuantity();


        $insert_db_orders->quantity = $quantity;
        $insert_db_orders->type = 'register';
        $customer_id = Auth::guard('c_user')->user()->id;


        $code_order = \App\Http\Controllers\Frontend\FC\RunCodeController::db_code_order();


        $insert_db_orders->customers_id_fk = $customer_id;

        $user_name = Auth::guard('c_user')->user()->username;
        $insert_db_orders->customers_user_name = $user_name;
        //$business_location_id = Auth::guard('c_user')->user()->business_location_id;
        $business_location_id = 1;
        $insert_db_orders->business_location_id_fk =  $business_location_id;

        $insert_db_orders->status_payment_sent_other = 0;



        if($rs->address_type_order == '1'){//ตามที่อยู่ลงทะเบียน


            if(empty($rs->sent_changwat) || empty($rs->sent_zipcode)){
                $data = ['status'=>'fail','ms'=>'กรุณากรอกที่อยู่ก่อนทำการซื้อสินค้า'];
                return $data;

            }



            $insert_db_orders->address_sent = 'system';
            $insert_db_orders->delivery_province_id = $rs->sent_changwat;
            $insert_db_orders->house_no = $rs->sent_no;
            $insert_db_orders->house_name =$rs->sent_home_name;
            $insert_db_orders->moo = $rs->sent_moo;
            $insert_db_orders->soi = $rs->sent_soi;
            $insert_db_orders->road = $rs->sent_road;
            $insert_db_orders->tambon_id = $rs->sent_tambon;
            $insert_db_orders->district_id = $rs->sent_amphur;
            $insert_db_orders->province_id = $rs->sent_changwat;
            $insert_db_orders->zipcode = $rs->sent_zipcode;

            $insert_db_orders->tel = $rs->phone;
            $insert_db_orders->name = $rs->firstname .' '. $rs->lastname;


        }

        if($rs->address_type_order == '2'){ //รับที่สาขา

            if(empty($rs->sent_branch_order)){
                $data = ['status'=>'fail','ms'=>'กรุณาเลือกสาขา'];
                return $data;

            }

            $insert_db_orders->address_sent = 'branch';
            $insert_db_orders->sentto_branch_id = $rs->sent_branch_order;

            $insert_db_orders->tel = $rs->same_phone;
            $insert_db_orders->name = $rs->sam_name;

        }





        if($rs->address_type_order == '3'){ //ที่อยู่อื่นๆ

            $insert_db_orders->address_sent = 'other';
            $insert_db_orders->address_sent = 'system';
            $insert_db_orders->delivery_province_id = $rs->sent_changwat_order;
            $insert_db_orders->house_no = $rs->sent_no_order;
            $insert_db_orders->house_name =$rs->sent_home_name_order;
            $insert_db_orders->moo = $rs->sent_moo_order;
            $insert_db_orders->soi = $rs->sent_soi_order;
            $insert_db_orders->road = $rs->sent_road_order;
            $insert_db_orders->tambon_id = $rs->sent_tambon_order;
            $insert_db_orders->district_id = $rs->sent_amphur_order;
            $insert_db_orders->province_id = $rs->sent_changwat_order;
            $insert_db_orders->zipcode = $rs->sent_zipcode_order;

            $insert_db_orders->tel = $rs->phone;
            $insert_db_orders->name = $rs->firstname .' '. $rs->lastname;
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
        $insert_db_orders->pay_type_id = $rs->pay_type_id;

        // dd($insert_db_orders->toArray());

        // $location = Location::location($business_location_id, $business_location_id);
        // $location = '';
        $cartCollection = Cart::session('register')->getContent();
        $data = $cartCollection->toArray();
        $quantity = Cart::session('register')->getTotalQuantity();

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
                    $vat_total =  ($total_price*$value['quantity'])*7/100;
                }else{
                    $vat_total = 0;
                }


                $insert_db_products_list[] = [
                    'code_order'=>$code_order,
                    'product_id_fk'=>$value['id'],
                    'product_unit_id_fk'=>@$value['product_unit_id'],
                    'customers_username' =>  $user_name,
                    'selling_price' =>  $value['price'],
                    'product_name' =>  $value['name'],
                    'amt' =>  $value['quantity'],
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
        $price = Cart::session('register')->getTotal();

        $vat = DB::table('dataset_vat')
        ->where('business_location_id_fk', '=', $business_location_id)
        ->first();

       $vat = $vat->vat;
       //vatใน 7%

        //มูลค่าสินค้า
        $price_vat = $price - $vat_total_sum;
        $insert_db_orders->product_value = $price_vat ;

        $shipping = RegisterController::fc_shipping($pv_total);
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

        $insert_db_orders->sum_price = $price;

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
        $insert_db_orders->total_price = $total_price;
        $insert_db_orders->pv_total = $pv_total;
        $insert_db_orders->tax = $vat;
        $insert_db_orders->tax_total = $vat_total_sum;
        $insert_db_orders->order_status_id_fk = 2;
        $insert_db_orders->quantity = $quantity ;
        $insert_db_orders->code_order = $code_order;


        try {
            DB::BeginTransaction();

        $insert_db_orders->save();
        $insert_order_products_list::insert($insert_db_products_list);


        //  Cart::session('register')->clear();
         $resule = ['status' => 'success', 'ms' => 'Order Success','order_id_fk'=>$insert_db_orders->id,'code_order'=>$code_order];


         DB::commit();

         return $resule;


         } catch (\Exception $e) {

        DB::rollback();

        $resule = ['status' => 'fail', 'ms' => $e->getMessage()];
        return $resule;
        }


    }

    public static function fc_shipping($pv)
    {
        // dd($pv);

        if($pv == 0 ){
            return 0;
        }

        if($pv < 500){

                return 50;

        }else{

                return 0;

        }


    }


    public static function check_id_card(Request $rs){
        if($rs->id_card){
          $resule = DB::table('customers')
          ->select('id')
          ->where('id_card','=',$rs->id_card)
          ->first();
          if($resule){
            $rs = ['status'=>'fail'];
          }else{
            $rs = ['status'=>'success'];
          }

        }else{
          $rs = ['status'=>'fail'];
        }
            return $rs;
        }


  public static function gencode_customer()
  {
      $y = date('Y');
      $y = substr($y, -2);
      $code =  IdGenerator::generate([
          'table' => 'customer_code',
          'field' => 'c_code',
          'length' => 10,
          'prefix' => 'PSB',
          'reset_on_prefix_change' => true
      ]);

        $ck_code = DB::table('customer_code')
        ->where('c_code','=',$code)
        ->first();

        if(empty($ck_code)){

            $rs_code_order = DB::table('customer_code')
            ->Insert(['c_code' => $code]);

            if ($rs_code_order == true) {
                return  $code;
              } else {
                \App\Models\Frontend\Register::gencode_customer();
              }

        }else{
          \App\Models\Frontend\Register::gencode_customer();
        }

  }
}
