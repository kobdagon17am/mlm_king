<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function member_register(Request $request)
    {
        // dd('1');
        // dd($request->all());
        //return response()->json(['status' => 'fail', 'ms' => 'ลงทะเบียนไม่สำเร็จกรุณาลงทะเบียนไหม่sss']);

        //BEGIN data validator
        $rule = [
            // BEGIN ข้อมูลส่วนตัว
            'upline_id' => 'required',
            'sponsor' => 'required',
            'side' => 'required',
            'number_of_member' => 'required',
            'business_location' => 'required',
            'prefix' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'marital_status' => 'required',
            'businessname' => 'required',
            'birthdate' => 'required|date',
            'idcard' => 'required|min:13|unique:customers',
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
            'idcard.required' => 'กรุณากรอกข้อมูล',
            'idcard.min' => 'กรุณากรอกให้ครบ 13 หลัก',
            'idcard.unique' => 'เลขบัตรนี้ถูกใช้งานแล้ว',
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
            // dd('111');
            $customer = [
                'user_name' => 'hhhh',
                // 'expire_date' => date('Y-m-d', $mt_mount_new),
                'password' => md5('11111'),
                'upline_id' => $request->upline_id,
                // 'pv_upgrad' =>$request->pv,
                'introduce_id' => $request->sponser,
                'type_upline' => $request->side,
                'prefix_name' => trim($request->prefixname),
                'first_name' => trim($request->firstname),
                'last_name' => trim($request->lastname),
                'business_name' => trim($request->businessname),
                'id_card' => trim($request->idcard),
                'phone' =>  trim($request->phone),
                'birth_day' =>  trim($request->birthdate),
                'nation_id' => 'ไทย',
                'email' => trim($request->email),
            ];

            dd($customer);
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'กรุณากรอกข้อมูลให้ครบถ้วนก่อนลงทะเบียน');
        }
    }
}
