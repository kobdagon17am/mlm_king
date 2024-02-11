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

        $get_customers = DB::table('customers_warning')
        ->where('id_card', 'like',$id_card.'%')
        ->get();




        return view('frontend.register_success', compact('get_customers'));
    }
}
