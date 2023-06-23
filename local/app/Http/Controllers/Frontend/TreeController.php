<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
// use App\Models\Frontend\\App\Http\Controllers\Frontend\TreeController:
use Auth;

class TreeController extends Controller
{


    public function __construct()
    {
        $this->middleware('customer');
         
    }

    public function index(Request $request)
    {

        if ($request->username) {
            $username = $request->username;
        } else {
            $username = Auth::guard('c_user')->user()->username;
        }

        $data = \App\Http\Controllers\Frontend\TreeController::line_all($username);

        return view('frontend/tree', compact('data'));
    }

    public function search(Request $request)
    {


        $data =  \App\Http\Controllers\Frontend\TreeController::line_all($request->home_search_id);

        return view('frontend/tree', compact('data'));
    }

    public function modal_tree(Request $request)
    {
        $username = $request->username;

        $user = DB::table('customers')
            ->select('customers.*', 'dataset_qualification.business_qualifications', 'dataset_package.dt_package')
            ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
            ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
            ->where('customers.username', '=', $username)
            ->first();


        $introduce =  DB::table('customers')
            ->select('customers.first_name', 'customers.last_name', 'customers.username', 'customers.prefix_name')
            ->where('customers.username', '=', $user->introduce_id)
            ->first();

        return view('frontend/modal/modal_tree', ['user' => $user, 'introduce' => $introduce]);
    }

    public function modal_add(Request $request)
    {
        $username = $request->username;
        $type = $request->type;
        $data = DB::table('customers')
            ->select('*')
            ->where('username', '=', $username)
            ->first();
        return view('frontend/modal/modal_add', ['data' => $data, 'type' => $type]);
    }

    public function home_type_tree(Request $request)
    {


        if ($request->username) {
            $username = $request->username;
        } else {
            $username = Auth::guard('c_user')->user()->username;
        }

        $data =  \App\Http\Controllers\Frontend\TreeController::line_all($username);
        return view('frontend/tree_type_tree', compact('data'));
    }

    public function under_a(Request $request)
    {

        $username = $request->username;

        $las_a_id = \App\Http\Controllers\Frontend\TreeController::m_under_a($username);

        $data =  \App\Http\Controllers\Frontend\TreeController::line_all($las_a_id);

        return view('frontend/tree', compact('data'));
    }

    public function under_b(Request $request)
    {
        $username = $request->username;

        $las_a_id = \App\Http\Controllers\Frontend\TreeController::m_under_b($username);

        $data =  \App\Http\Controllers\Frontend\TreeController::line_all($las_a_id);

        return view('frontend/tree', compact('data'));
    }

    public function home_check_customer_id(Request $request)
    {

        $resule = \App\Http\Controllers\Frontend\TreeController::check_line($request->username);

        if ($resule['status'] == 'success') {
            $data = array('status' => 'success', 'username' => $resule['data']->username);
        } else {
            $data = array('status' => 'fail', 'data' => $resule);
        }
        //$data = ['status'=>'fail'];
        return $data;
    }


    public static function line_all($username = '')
    {
        $data = array();

        if (empty($username)) {
            return null;
        } else {

            $lv1 = DB::table('customers')
                ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                ->where('customers.username', '=', $username)
                ->first();


            $lv2_a = DB::table('customers')
                ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                ->where('customers.upline_id', '=', $lv1->username)
                ->where('customers.line_type', '=', 'A')
                ->first();



            if ($lv2_a) {

                $lv3_a_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv2_a->username)
                    ->where('customers.line_type', '=', 'A')
                    ->first();

                $lv3_a_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv2_a->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv2_a = null;
                $lv3_a_a = null;
                $lv3_a_b = null;
            }


            if ($lv3_a_a) {

                $lv4_a_a_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_a_a->username)
                    ->where('customers.line_type', '=', 'A')
                    ->first();

                $lv4_a_a_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_a_a->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv3_a_a = null;
                $lv4_a_a_a = null;
                $lv4_a_a_b = null;
            }

            if ($lv3_a_b) {

                $lv4_a_b_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_a_b->username)
                    ->where('customers.line_type', '=', 'A')
                    ->first();

                $lv4_a_b_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_a_b->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv3_a_b = null;
                $lv4_a_b_a = null;
                $lv4_a_b_b = null;
            }


            $lv2_b = DB::table('customers')
                ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                ->where('customers.upline_id', '=', $lv1->username)
                ->where('customers.line_type', '=', 'B')
                ->first();

            if ($lv2_b) {

                $lv3_b_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv2_b->username)
                    ->where('customers.line_type', '=', 'A')
                    ->first();


                $lv3_b_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv2_b->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv2_b = null;
                $lv3_b_a = null;
                $lv3_b_b = null;
            }
            //////////////////

            if ($lv3_b_a) {

                $lv4_b_a_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_b_a->username)
                    ->where('customers.line_type', '=', 'A')
                    ->first();

                $lv4_b_a_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_b_a->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv3_b_a = null;
                $lv4_b_a_a = null;
                $lv4_b_a_b = null;
            }

            if ($lv3_b_b) {

                $lv4_b_b_a = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('upline_id', '=', $lv3_b_b->username)
                    ->where('line_type', '=', 'A')
                    ->first();

                $lv4_b_b_b = DB::table('customers')
                    ->select('customers.id', 'customers.username', 'customers.business_name', 'customers.prefix_name', 'customers.first_name', 'customers.last_name', 'customers.profile_img', 'customers.upline_id', 'customers.qualification_id', 'customers.pv_mt_active', 'dataset_package.img')
                    ->leftjoin('dataset_qualification', 'dataset_qualification.id', '=', 'customers.qualification_id')
                    ->leftjoin('dataset_package', 'dataset_package.id', '=', 'customers.package_id')
                    ->where('customers.upline_id', '=', $lv3_b_b->username)
                    ->where('customers.line_type', '=', 'B')
                    ->first();
            } else {
                $lv3_b_b = null;
                $lv4_b_b_a = null;
                $lv4_b_b_b = null;
            }

            $data = [
                'lv1' => $lv1,
                'lv2_a' => $lv2_a, 'lv2_b' => $lv2_b,
                'lv3_a_a' => $lv3_a_a, 'lv3_a_b' => $lv3_a_b,
                'lv3_b_a' => $lv3_b_a, 'lv3_b_b' => $lv3_b_b,

                'lv4_a_a_a' => $lv4_a_a_a, 'lv4_a_a_b' => $lv4_a_a_b, 'lv4_a_b_a' => $lv4_a_b_a, 'lv4_a_b_b' => $lv4_a_b_b,
                'lv4_b_a_a' => $lv4_b_a_a, 'lv4_b_a_b' => $lv4_b_a_b, 'lv4_b_b_a' => $lv4_b_b_a, 'lv4_b_b_b' => $lv4_b_b_b
            ];

            return $data;
        }
    }


    public static function check_img($type,$date=''){

      if($type == 1){ // 1	Bronze ////b.png
        $img =  asset('local/public/images/b.png');
      }elseif($type == 2){// 2	Silver //s.png
        $img =  asset('local/public/images/s.png');
      }elseif($type == 3){ // 3	Gold //g.png
        $img =  asset('local/public/images/g.png');
      }elseif($type == 4){// 4	Diamond //d.png
        $img =  asset('local/public/images/ex.png');
      }elseif($type == 5){// 5	Crown Diamond //ex.jpg
        $img =  asset('local/public/images/c.png');
      }else{ // not-active.png
        $img =  asset('local/public/images/not-active.png');
      }

      $resule = ['img'=>$img];
      return $resule;

    }

    public static function check_line($username){

        $data_user = DB::table('customers')
        ->select('id','username','business_name','prefix_name','first_name','last_name','profile_img','upline_id','qualification_id')
        ->where('username','=',$username)
        ->first();

        if(!empty($data_user)){

        $username = Auth::guard('c_user')->user()->username;
        $username_c = Auth::guard('c_user')->user()->username;//ของผู้เซิท


            if( $data_user->username == $username){

                $resule = ['status'=>'success','message'=>'My Account','data'=>$data_user];
                return $resule;
            }

            $username = $data_user->upline_id;
            $j = 2;
            for ($i=1; $i <= $j ; $i++){
                if($i == 1){
                    $data = DB::table('customers')
                    ->select('username','upline_id')
                    ->where('username','=',$username)
                //->where('upline_id','=',$use_id)
                    ->first();
                }

                if($data){

                    if($data->username == $username_c || $data->upline_id == $username_c){
                        $resule = ['status'=>'success','message'=>'Under line','data'=>$data_user];
                        $j =0;

                    }elseif($data->upline_id == 'AA'){

                        $resule = ['status'=>'fail','message'=>'ไม่พบรหัสสมาชิกดังกล่าวหรือไม่ได้อยู่ในสายงานเดียวกัน'];
                        $j =0;
                    }else{

                        $data = DB::table('customers')
              ->select('username','upline_id')
                        ->where('username','=',$data->upline_id)
                        ->first();

                        $j = $j+1;
                    }

                }else{
                    $resule = ['status'=>'fail','message'=>'ไม่พบรหัสสมาชิกดังกล่าวหรือไม่ได้อยู่ในสายงานเดียวกัน'];
                    $j =0;
                }
            }
            return $resule;

        }else{
            $resule = ['status'=>'fail','message'=>'ไม่พบข้อมูลผู้ใช้งานรหัสนี้'];
            return $resule;

        }

    }


    public static function m_under_a($username=''){


        if (empty($username)) {

            return null;
        }else{
            $j = 2;

            for ($i=1; $i<$j; $i++) {


                $last_id_a = DB::table('customers')
                ->select('upline_id','username','upline_id','qualification_id')
                ->where('upline_id','=',$username)
                ->where('line_type','=','A')
                ->first();

                if($last_id_a){
                    $j = $j+$i;
                    $username	= $last_id_a->username;

                }else{
                    $j = 0;

                    $last_id_a = DB::table('customers')
                    ->select('upline_id','username','upline_id','qualification_id')
                    ->where('username','=',$username)
                    ->where('line_type','=','A')
                    ->first();
                    return $last_id_a->upline_id;

                }

            }

        }
    }

    public static function m_under_b($username=''){

        if (empty($username)) {

            return null;
        }else{
            $j = 2;

            for ($i=1; $i<$j; $i++) {

                $last_id_a = DB::table('customers')
                ->select('upline_id','username','upline_id','qualification_id')
                ->where('upline_id','=',$username)
                ->where('line_type','=','B')
                ->first();

                if($last_id_a){
                    $j = $j+$i;
                    $username	= $last_id_a->username;
                }else{
                    $j = 0;

                    $last_id_a = DB::table('customers')
                    ->select('upline_id','username','upline_id','qualification_id')
                    ->where('username','=',$username)
                    ->where('line_type','=','B')
                    ->first();
                    return $last_id_a->upline_id;
                }

            }

        }
    }

}
