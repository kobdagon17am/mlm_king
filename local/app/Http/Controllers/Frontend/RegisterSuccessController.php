<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterSuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }
    public function index($id_card)
    {
        //   dd('111');

        $get_customers = DB::table('customers')
            ->where('id_card',$id_card)
            ->get();

        // dd($get_customers);


        return view('frontend.register_success', compact('get_customers'));
    }
}
