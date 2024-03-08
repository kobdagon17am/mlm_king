<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cart;
use App\Customer;
use App\Customers_address_card;
use App\Customers_address_delivery;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('customer');

    }

  public function index()
  {


    $provinces = DB::table('1dataset_changwat')
    ->select('*')
    ->where('status','0')
    ->get();

    $stocks = DB::table('stocks')
    ->selectRaw('products.id,products.product_name,sum(stocks.amt) as amt_total')
    ->leftJoin('products', 'products.id', '=','stocks.product_id_fk')
    ->where('stocks.customer_id',Auth::guard('c_user')->user()->id)
    ->where('stocks.status','success')
    ->groupBy('products.id','products.product_name')
    ->get();


    $customers_address_delivery = DB::table('customers_address_delivery')

    ->where('customers_address_delivery.customer_id', Auth::guard('c_user')->user()->id)
    ->first();




    $data = ['provinces' => $provinces,'customers_address_delivery'=>$customers_address_delivery,'stocks'=>$stocks];
    return view('frontend.profile', compact('data'));

  }

  public function editprofileimg()
  {

    return view('frontend.profile_upload');

  }


  public function update_img_profile(Request $request)
  {
    try {
        // dd($request->all());

        if ($request->img) {

            $url = 'local/public/profile_customer/' . date('Ym');
            $imageName = $request->img->extension();
            $filenametostore =  date("YmdHis")  .'_'.  Auth::guard('c_user')->user()->id . "." . $imageName;
            $request->img->move($url,  $filenametostore);
            $name = date('Ym') . '/'. $filenametostore;
            $update = DB::table('customers')
            ->where('id', '=', Auth::guard('c_user')->user()->id)
            ->update(['profile_img' => $name]);
        return redirect('home')->withSuccess('Upload image Success');


        } else{

            return redirect('home')->withError('Upload image Error');
        }

    } catch (Exception $e) {
        return redirect('home')->withError('Upload image Error');

    }

  }



  public function  profile_edit(Request $request)
  {



     $customer_insert = Customer::find(Auth::guard('c_user')->user()->id);


     $customer_insert->prefix_name = trim($request->prefix_name);

     $customer_insert->first_name = trim($request->firstname);
     $customer_insert->last_name = trim($request->lastname);

     $customer_insert->phone = trim($request->phone);
     $customer_insert->email = trim($request->email);


     try {

            DB::BeginTransaction();
            $customer_insert->save();
            DB::commit();

        return redirect('Profile')->withSuccess('Success');
    } catch (Exception $e) {
        //code
        DB::rollback();
        redirect('Profile')->withError('Error');
    }


  }


  public function  profile_edit_address(Request $request)
  {


     $dataset_changwat = DB::table('1dataset_changwat')
     ->select('name_th')
     ->where('id',$request->sent_changwat)
     ->first();

     $dataset_amphuress = DB::table('2dataset_amphuress')
     ->select('name_th')
     ->where('id',$request->sent_amphur)
     ->first();

     $dataset_tambon = DB::table('3dataset_tambon')
     ->select('name_th')
     ->where('id',$request->sent_tambon)
     ->first();
     $check  = DB::table('customers_address_delivery')
     ->select('id')
     ->where('customer_id',Auth::guard('c_user')->user()->id)
     ->first();
     if($check){
        $customers_address_delivery_insert  = Customers_address_delivery::find($check->id);

     }else{
        $customers_address_delivery_insert = new Customers_address_delivery;

     }


     $customers_address_delivery_insert->customer_id = Auth::guard('c_user')->user()->id;
     $customers_address_delivery_insert->username =Auth::guard('c_user')->user()->username;
     $customers_address_delivery_insert->sent_no = trim($request->sent_no);
     $customers_address_delivery_insert->sent_moo = trim($request->sent_moo);
     $customers_address_delivery_insert->sent_home_name = trim($request->sent_home_name);
     $customers_address_delivery_insert->sent_soi = trim($request->sent_soi);
     $customers_address_delivery_insert->sent_road = trim($request->sent_road);
     $customers_address_delivery_insert->sent_tambon_id_fk =  trim($request->sent_tambon);
     $customers_address_delivery_insert->sent_tambon =$dataset_tambon->name_th;
     $customers_address_delivery_insert->sent_district_id_fk =  trim($request->sent_amphur);
     $customers_address_delivery_insert->sent_district = $dataset_amphuress->name_th;
     $customers_address_delivery_insert->sent_province_id_fk = trim($request->sent_changwat);
     $customers_address_delivery_insert->sent_province = $dataset_changwat->name_th;
     $customers_address_delivery_insert->sent_zipcode = trim($request->sent_zipcode);


     try {

            DB::BeginTransaction();
            $customers_address_delivery_insert->save();
            DB::commit();

        return redirect('Profile')->withSuccess('Success');
    } catch (Exception $e) {
        //code
        DB::rollback();
        redirect('Profile')->withError('Error');
    }


  }


  public function change_password(Request $request)
  {

      $validator = Validator::make(
          $request->all(),
          [
              // 'password' => 'required',
              'password1' => 'required',
              'password2' => 'required',

          ],
          [
              'password1.required' => 'กรุณากรอกรหัสผ่านเดิม',
              'password2.required' => 'กรุณากรอกรหัสผ่านใหม่',

          ]
      );



      if (!$validator->fails()) {


          // $password = md5($request->password);
          $password_new = md5($request->password1);
          $password_new_comfirm = md5($request->password2);

          $user_id = Auth::guard('c_user')->user()->id;

          $Cuser = Customer::where('id', $user_id)->first();

          // Check รหัสผ่านเดิมที่กรอกมาตรงกันของเดิมหรือไม่


              // Check รหัสผ่านใหม่ ต้องตรงกันทั้ง 2 อัน
              if ($password_new == $password_new_comfirm) {
                  $Cuser->password = md5($request->password2);
                  $Cuser->save();
                  return redirect('logout');
              }

              return   redirect('ChangePassword')->withError('รหัสผ่านใหม่ไม่ตรงกัน');

      }
      return redirect('ChangePassword')->withError('Error');
  }






}
