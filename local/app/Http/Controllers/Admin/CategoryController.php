<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
      // dd('111');
      
    $get_category = DB::table('categories')
        // ->where('username','=',Auth::guard('c_user')->user()->username)
        // ->where('password','=',md5($req->password))
        // ->first();
        ->get();
        return view('backend/category', compact('get_category'));
   
        
    //     ;
    }
    public function insert(Request $rs){
      // dd($rs->all());
      
      $dataPrepare = [
        'category_name' => $rs->category_name,
        'category_en_name' => $rs->category_en_name,
        'status' => $rs->category_status,
    ];

    $get_category = DB::table('categories')
    ->insert($dataPrepare);
    // dd('success');
    return redirect('admin/Category')->withSuccess('เพิ่มหมวดสินค้าสำเร็จ');


     
    }

}
