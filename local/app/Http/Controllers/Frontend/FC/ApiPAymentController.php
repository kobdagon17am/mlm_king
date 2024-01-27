<?php

namespace App\Http\Controllers\Frontend\FC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class ApiPAymentController extends Controller
{


    public function payment_complete_backend(Request $rs)
    {
        Log::channel('payment')->info('Payment complete backend request:', ['data' => $rs->all()]);

        $payment = new Payment();
                        $payment->customer_id = $rs->CustomerId;
                        $payment->order_id_fk = $rs->OrderNo;
                        $payment->pay_transaction_id = $rs->TransactionId;
                        $payment->pay_amount = $rs->Amount;

                        $payment->pay_customer_id = $rs->CustomerId;
                        $payment->pay_bank_code = $rs->BankCode;
                        $payment->pay_payment_date = $rs->PaymentDate;
                        $payment->pay_payment_status = $rs->PaymentStatus;
                        $payment->pay_bank_ref_code = $rs->BankRefCode;
                        $payment->pay_current_date = $rs->CurrentDate;
                        $payment->pay_current_time = $rs->CurrentTime;
                        $payment->pay_payment_discription = $rs->PaymentDescription;
                        $payment->pay_credit_cart_token = $rs->CreditCardToken;
                        $payment->pay_currency = $rs->Currency;
                        $payment->pay_customer_name = $rs->CustomerName;
                        $payment->pay_check_sum = $rs->CheckSum;
                        if($rs->PaymentStatus==0){
                            $payment->payment_status = 1;
                        }else{
                            $payment->payment_status = 2;
                        }

                        try {
                            DB::BeginTransaction();
                            $payment->save();

                         DB::commit();

                         return response()->json(array('result' => 'SUCCESS', "msg" => 'OK'));


                         } catch (\Exception $e) {
                            Log::channel('payment')->info('Payment complete backend request:', ['data' => $rs->all(),'error'=> $e->getMessage()]);
                        DB::rollback();
                        return response()->json(array('result' => 'FAIL', "msg" => $e->getMessage()));

                        }



                        // $insert_db_orders->pay_type_id = 3;
                        // $pay_type_name = DB::table('dataset_order_pay')
                        // ->select('*')
                        // ->where('id', '=', 3)
                        // ->first();

                        // $insert_db_orders->pay_type_name =  $pay_type_name->name;



    }

    public static function payment_form()
    {
        // Log::channel('payment')->info('Payment complete backend request:', ['data' => $rs->all()]);
        // dd('dd');
        return view('frontend/payment/payment_form');

    }

    public function payment_complete(Request $r)
    {

        if($r->respCode=='0'){
            return view('frontend.payment.payment_complete',[
                'result_status'=>$r->status,
            ]);
        }else{
            return view('frontend.payment.payment_error',[
                'result_status'=>$r->status,
            ]);
        }

    }



}
