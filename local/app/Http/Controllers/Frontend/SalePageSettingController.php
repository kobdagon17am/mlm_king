<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Customer;

class SalePageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }
    public function index()
    {
        // dd('111');

        $get_customer = DB::table('customers')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            // ->where('password','=',md5($req->password))
            ->first();
            
            
            // dd($get_customer);

        return view('frontend.salepage_setting', compact('get_customer'));
    }

    public function edit_SalePageSetting(Request $rs)
    {
        //   dd($rs->all());

        $dataPrepare = [
            'phone' => $rs->phone,
            'facebook' => $rs->facebook,
            'instagram' => $rs->instagram,
            'id_line' => $rs->id_line,
        ];

        // dd($dataPrepare);
        try {
            DB::BeginTransaction();
            $get_customer = DB::table('customers')
                ->where('id', '=', $rs->id)
                ->update($dataPrepare);
            DB::commit();
            return redirect('SalePageSetting')->withSuccess('บันทึกข้อมูลสำเร็จ');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('SalePageSetting')->withError('บันทึกข้อมูลไม่สำเร็จ');
        }
    }
}
