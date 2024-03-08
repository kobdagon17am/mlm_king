<?php

namespace App\Http\Controllers\Frontend\FC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use App\Model\Payment;
use Illuminate\Support\Facades\Log;
use App\Customer;
use Auth;
use Session;
class ApiPAymentController extends Controller
{


    public function payment_complete_backend(Request $rs)
    {
        //  Log::channel('payment')->info('Payment complete backend request:', ['data' => $rs->all()]);
        Log::channel('payment')->info('Fail:', ['data' => $rs->all(),'error'=> 1]);
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
                        // Log::channel('payment')->info('Fail:', ['data' => $rs->all(),'error'=> 2]);
                        try {
                            DB::BeginTransaction();

                        if($rs->respCode==0){
                            $payment->payment_status = 1;

                            $order_data = DB::table('db_orders')
                            ->where('id', '=', $rs->OrderNo)
                            ->first();
                            // Log::channel('payment')->info('Fail:', ['data' => $rs->all(),'error'=> 3]);

                            if($order_data->type == 'register'){





                                    if (empty($orders)) {
                                        return redirect('admin/orders/list')->withError('ไม่พบรายละเอียดบิล');
                                    }


                                    $get_customers = DB::table('customers_warning')
                                        ->where('order_id_fk', $rs->OrderNo)
                                        ->get();

                                    $customer = [];
                                    $delivery = [];


                                    if (count($get_customers) >= 4 || count($get_customers) == 0) {
                                        Log::channel('payment')->info('Payment complete backend FAIL:', ['data' => $rs->all(),'error'=>'อนุมัติบิลไม่สำเร็จ get_customers > 3']);
                                        return response()->json(array('result' => 'FAIL', "msg" => 'OK'));
                                        //return redirect('admin/orders/list')->withError('อนุมัติบิลไม่สำเร็จกรุณติดต่อ Dev');
                                    }

                                    if (count($get_customers) == 1 || count($get_customers) == 3) {

                                        try {
                                            DB::BeginTransaction();
                                            foreach ($get_customers as $val) {
                                                // Convert the object properties to an array
                                                $data = get_object_vars($val);
                                                $customer_id = $data['id'];
                                                // Exclude specified fields

                                                unset($data['id']);
                                                unset($data['order_id_fk']);
                                                unset($data['regis_doctranfer_status']);
                                                unset($data['code_order']);
                                                unset($data['created_at']);
                                                unset($data['updated_at']);
                                                unset($data['deleted_at']);

                                                // Add the modified array to the $insert array
                                                $customer = $data;
                                                $customer_lastid = DB::table('customers')->insertGetId($customer);

                                                $customers_warning = DB::table('customers_warning')
                                                    ->where('id', $customer_id)
                                                    ->update(['regis_doctranfer_status' => 'success']);


                                                $customers_address_delivery_warning = DB::table('customers_address_delivery_warning')
                                                    ->where('customer_id', $customer_id)
                                                    ->get();

                                                foreach ($customers_address_delivery_warning as $val_delivery) {
                                                    $data_delivery = get_object_vars($val_delivery);
                                                    $data_delivery['customer_id']  = $customer_lastid;

                                                    unset($data_delivery['id']);
                                                    unset($data_delivery['created_at']);
                                                    unset($data_delivery['updated_at']);
                                                    unset($data_delivery['deleted_at']);

                                                    // Add the modified array to the $insert array
                                                    $delivery = $data_delivery;
                                                    $delivery_lastid = DB::table('customers_address_delivery')->insertGetId($delivery);
                                                }
                                            }

                                            $order = DB::table('db_orders')
                                            ->where('id', '=',$rs->OrderNo)
                                            ->update(['order_status_id_fk' => '6' ,'pay_type_name'=>$rs->BankCode,'approve_date'=>now()]);

                                            DB::commit();

                                            return response()->json(array('result' => 'SUCCESS', "msg" => 'OK'));
                                        } catch (\Exception $e) {


                                            DB::rollback();
                                            return response()->json(array('result' => 'FAIL', "msg" => $e->getMessage()));

                                        }
                                    }




                            }else{
                                if($order_data->order_status_id_fk != 6 and  $order_data->order_status_id_fk != 7){

                                    $order = DB::table('db_orders')
                                    ->where('id', '=',$rs->OrderNo)
                                    ->update(['order_status_id_fk' => '6' ,'pay_type_name'=>$rs->BankCode,'approve_date'=>now()]);


                                }

                            }



                        }else{
                            // Log::channel('payment')->info('Fail:', ['data' => $rs->all(),'error'=> 4]);
                            $payment->payment_status = 2;
                        }

                        $payment->save();
                         DB::commit();
                         return response()->json(array('result' => 'SUCCESS', "msg" => 'OK'));


                         } catch (\Exception $e) {


                        // Log::channel('payment')->info('Fail:', ['data' => $rs->all(),'error'=> $e->getMessage()]);
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

        return view('frontend/payment/payment_form');

    }

    public function payment_complete(Request $r)
    {
        // Log::channel('payment')->info('Payment complete backend request:', ['data' => $r->all()]);
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
