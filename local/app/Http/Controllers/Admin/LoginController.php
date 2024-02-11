<?php
namespace App\Http\Controllers\Admin;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use App\Http\Controllers\Session;
class LoginController extends Controller
{
    public function admin_login(Request $req)
    {

        $admin = Admin::where('username',$req->username)
            // ->whereIn('status', [1, 2])
            ->first();
            // Auth::guard('admin')->login($admin);
            // return redirect('admin/Dashboard');

        if ($admin) {

            $get_users = Admin::where('username','=',$req->username)
            ->where('password','=',md5($req->password))
            ->first();

            if ($get_users) {

                Auth::guard('admin')->login($get_users);
                return redirect('admin/Dashboard');
            } else {
                return redirect('admin')->withError(
                    'Pless check username and password !.'
                );
            }
        }else{

            return redirect('admin')->withError('Pless check username and password !.');
        }

    }

}
