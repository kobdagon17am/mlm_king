<?php

namespace App\Http\Controllers\Frontend\FC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;

class UplineAllController extends Controller
{
    public static $arr = array();

    public function __construct()
    {
        $this->middleware('customer');
    }

    //App\Http\Controllers\Frontend\FC\UplineAllController::all_upline();

    public static function all_upline($user_name){
        $introduce = self::tree($user_name)->flatten();
        $data = ['status'=>'all','username'=>self::$arr['username'],'name'=>self::$arr['name']];

        return $data;
    }


  public static function tree($user_name)
  {
    $user = DB::table('customers')
    ->select(
      'customers.id',
      'customers.username',
      'customers.first_name',
      'customers.last_name',
      'customers.upline_id',
      'customers.line_type',
    )
   ->where('customers.username', '=', $user_name)
   ->first();
   self::$arr['username'][] = $user->username;
   self::$arr['name'][$user->username] = $user->first_name.' '.$user->last_name ;


    $all_upline = self::user_upline($user_name, null);
    //self::formatTree($c);
    UplineAllController::formatTree($all_upline);
    return $all_upline;
  }


  public static function user_upline($user_name)
  {

    $introduce = DB::table('customers')
      ->select(
        'customers.id',
        'customers.username',
        'customers.first_name',
        'customers.last_name',
        'customers.upline_id',
        'customers.line_type',
      )
     ->where('customers.upline_id', '=', $user_name);

    return $introduce->get();
  }

  public static function formatTree($uplines,$num = 0,$i=0)
  {
    $num += 1;
    foreach ($uplines as $upline) {
      $upline->lv = $num;
      $upline->children = self::user_upline($upline->username);

      if ($upline->children->isNotEmpty()) {
        self::$arr['username'][] = $upline->username;
        self::$arr['name'][$upline->username] = $upline->first_name.' '.$upline->last_name ;
        self::formatTree($upline->children, $num,$i);
      } else {
        self::$arr['username'][] = $upline->username;
        self::$arr['name'][$upline->username] = $upline->first_name.' '.$upline->last_name ;
      }
    }
  }




}
