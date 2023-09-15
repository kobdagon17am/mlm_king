<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $currentDate = now();
      
      $get_promotion_general = DB::table('promotion')
      ->select('promotion.*', 'promotion_images.promotion_image_url', 'promotion_images.promotion_image_name')
      ->leftJoin('promotion_images', 'promotion_images.promotion_id_fk', '=', 'promotion.id')
      ->whereDate('promotion.promotion_start_date', '<=', $currentDate)
      ->whereDate('promotion.promotion_end_date', '>=', $currentDate)
      ->where('promotion.promotion_status','=',"1")
      ->where('promotion.promotion_type','=','General')
      ->get();

      $get_promotion_warehouse = DB::table('promotion')
      ->select('promotion.*', 'promotion_images.promotion_image_url', 'promotion_images.promotion_image_name')
      ->leftJoin('promotion_images', 'promotion_images.promotion_id_fk', '=', 'promotion.id')
      ->whereDate('promotion.promotion_start_date', '<=', $currentDate)
      ->whereDate('promotion.promotion_end_date', '>=', $currentDate)
      ->where('promotion.promotion_status','=',"1")
      ->where('promotion.promotion_type','=','Warehouse')
      ->get();

      // dd($get_promotion);


      $get_news = DB::table('news')
      ->select('news.*', 'news_images.news_image_url', 'news_images.news_image_name')
      ->leftJoin('news_images', 'news_images.news_id_fk', '=', 'news.id')
      ->where('news.news_status','=',"1")
      ->get();

      // dd($get_news);


      return view('frontend.home', compact('get_promotion_general','get_promotion_warehouse','get_news'));
    }

}
