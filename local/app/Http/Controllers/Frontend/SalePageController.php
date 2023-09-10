<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Customer;

class SalePageController extends Controller
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

        return view('frontend.salepage1', compact('get_customer'));
    }
}
