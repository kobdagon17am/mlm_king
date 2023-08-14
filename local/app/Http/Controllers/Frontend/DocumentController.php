<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {
        // dd('111');
        $get_customer_doc = DB::table('register_files')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            ->get();

        $get_customer_doc1 = DB::table('register_files')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            ->where('type', '=', '1')
            ->wherein('regis_doc_status',[1,2])
            ->first();

        // dd($get_customer_doc1);

        $get_customer_doc2 = DB::table('register_files')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            ->where('type', '=', '2')
            ->wherein('regis_doc_status',[1,2])
            ->first();

        $get_customer_doc3 = DB::table('register_files')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            ->where('type', '=', '3')
            ->wherein('regis_doc_status',[1,2])
            ->first();

        $get_customer_doc4 = DB::table('register_files')
            ->where('username', '=', Auth::guard('c_user')->user()->username)
            ->where('type', '=', '4')
            ->wherein('regis_doc_status',[1,2])
            ->first();


        return view('frontend.doc', compact('get_customer_doc','get_customer_doc1', 'get_customer_doc2', 'get_customer_doc3', 'get_customer_doc4'));
    }
}
