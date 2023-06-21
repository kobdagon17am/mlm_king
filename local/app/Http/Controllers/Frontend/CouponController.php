<?php
namespace App\Http\Controllers\Frontend;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index(){
      // dd('111');
      
    $get_coupon = DB::table('coupon')
        ->where('username','=',Auth::guard('c_user')->user()->username)
        // ->where('password','=',md5($req->password))
        // ->first();
        ->get();
        return view('frontend.coupon', compact('get_coupon'));
   
        
        ;
    }


}
