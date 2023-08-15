<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\Customers_address_card;
use App\Customers_address_delivery;
use App\Customers_bank;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index($user_name, $line_type)
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



            $data = ['data' => $resule, 'line_type_back' => $line_type, 'provinces' => $provinces, 'business_location' => $business_location, 'country' => $country];

            return view('frontend/register', compact('data'));
        }
    }


    public function member_register(Request $request)
    {
        //  dd('1');
        // dd($request->all());
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
            'email' => 'required|email',
            // END ข้อมูลส่วนตัว

            // BEGIN ที่อยู่ตามบัตรประชาชน
            // 'file_card' => 'required|mimes:jpeg,jpg,png',
            'card_no' => 'required',
            'card_moo' => 'required',
            'card_home_name' => 'required',
            'card_soi' => 'required',
            'card_road' => 'required',
            'card_tambon' => 'required',
            'card_amphur' => 'required',
            'card_changwat' => 'required',
            'card_zipcode' => 'required',
            // END ที่อยู่ตามบัตรประชาชน

            //  BEGIN ที่อยู่จัดส่ง
            'sent_no' => 'required',
            'sent_moo' => 'required',
            'sent_home_name' => 'required',
            'sent_soi' => 'required',
            'sent_road' => 'required',
            'sent_tambon' => 'required',
            'sent_amphur' => 'required',
            'sent_changwat' => 'required',
            'sent_zipcode' => 'required',
            // END ที่อยู่จัดส่ง

            //  BEGIN ข้อมูลบัญชี
            'acc_name' => 'required',
            'acc_no' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'bank_type' => 'required',
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
            'email.required' => 'กรุณากรอกข้อมูล',
            'email.email' => 'กรุณากรอกอีเมล์',
            // END ข้อมูลส่วนตัว

            // BEGIN ที่อยู่ตามบัตรประชาชน
            'card_no.required' => 'กรุณากรอกข้อมูล',
            'card_moo.required' => 'กรุณากรอกข้อมูล',
            'card_home_name.required' => 'กรุณากรอกข้อมูล',
            'card_soi.required' => 'กรุณากรอกข้อมูล',
            'card_road.required' => 'กรุณากรอกข้อมูล',
            'card_tambon.required' => 'กรุณากรอกข้อมูล',
            'card_amphur.required' => 'กรุณากรอกข้อมูล',
            'card_changwat.required' => 'กรุณากรอกข้อมูล',
            'card_zipcode.required' => 'กรุณากรอกข้อมูล',
            // END ที่อยู่ตามบัตรประชาชน

            // BEGIN ที่อยู่จัดส่ง
            'sent_no.required' => 'กรุณากรอกข้อมูล',
            'sent_moo.required' => 'กรุณากรอกข้อมูล',
            'sent_home_name.required' => 'กรุณากรอกข้อมูล',
            'sent_soi.required' => 'กรุณากรอกข้อมูล',
            'sent_road.required' => 'กรุณากรอกข้อมูล',
            'sent_tambon.required' => 'กรุณากรอกข้อมูล',
            'sent_amphur.required' => 'กรุณากรอกข้อมูล',
            'sent_changwat.required' => 'กรุณากรอกข้อมูล',
            'sent_zipcode.required' => 'กรุณากรอกข้อมูล',
            // END ที่อยู่จัดส่ง

            //  BEGIN ข้อมูลบัญชี
            'acc_name.required' => 'กรุณากรอกข้อมูล',
            'acc_no.required' => 'กรุณากรอกข้อมูล',
            'bank_name.required' => 'กรุณากรอกข้อมูล',
            'bank_branch.required' => 'กรุณากรอกข้อมูล',
            'bank_type.required' => 'กรุณากรอกข้อมูล',
            // END ข้อมูลบัญชี


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

        // dd($rule);
        //END data validator

        if (!$validator->fails()) {

            //INSERT CUSTOMER
            $customer_insert = new Customer;
            $customer_insert->username = 'hhh3';
            $customer_insert->password = md5('11111');
            $customer_insert->password_real = '11111';
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
            $customers_address_card_insert = new Customers_address_card;
            $customers_address_card_insert->card_house_no = trim($request->card_no);
            $customers_address_card_insert->card_moo = trim($request->card_moo);
            $customers_address_card_insert->card_home_name = trim($request->card_home_name);
            $customers_address_card_insert->card_soi = trim($request->card_soi);
            $customers_address_card_insert->card_road = trim($request->card_road);
            $customers_address_card_insert->card_tambon_id_fk = '1';
            $customers_address_card_insert->card_tambon = trim($request->card_tambon);
            $customers_address_card_insert->card_district_id_fk = '1';
            $customers_address_card_insert->card_amphur = trim($request->card_amphur);
            $customers_address_card_insert->card_province_id_fk = '1';
            $customers_address_card_insert->card_changwat = trim($request->card_changwat);
            $customers_address_card_insert->card_zipcode = trim($request->card_zipcode);


            //INSERT CUSTOMER ADDRESS DELIVERY
            $customers_address_delivery_insert = new Customers_address_delivery;
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
            $customers_bank_insert = new Customers_bank;
            $customers_bank_insert->account_name = trim($request->acc_name);
            $customers_bank_insert->account_no = trim($request->acc_no);
            $customers_bank_insert->bank_id_fk = '1';
            $customers_bank_insert->bank_name = trim($request->bank_name);
            $customers_bank_insert->bank_code = trim($request->bank_code);
            $customers_bank_insert->bank_branch = trim($request->bank_branch);
            $customers_bank_insert->bank_type = trim($request->bank_type);


            try {
                DB::BeginTransaction();
                $customer_insert->save();
                // dd($customer_insert);
                $customers_address_card_insert->customer_id = $customer_insert->id;
                $customers_address_card_insert->username = $customer_insert->username;
                $customers_address_delivery_insert->customer_id = $customer_insert->id;
                $customers_address_delivery_insert->username = $customer_insert->username;
                $customers_address_delivery_insert->sent_phone = $customer_insert->phone;
                $customers_bank_insert->customer_id = $customer_insert->id;
                $customers_bank_insert->username = $customer_insert->username;
                $customers_address_card_insert->save();
                $customers_address_delivery_insert->save();
                $customers_bank_insert->save();
                DB::commit();

                // dd($customer_insert);

                return redirect('RegisterSuccess/' . $customer_insert->username)->withSuccess('สมัครสมาชิกสำเร็จ');
            } catch (Exception $e) {
                //code
                DB::rollback();
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'กรุณากรอกข้อมูลให้ครบถ้วน');
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
}
