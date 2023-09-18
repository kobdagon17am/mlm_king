<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\News;

class NewsDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }
    public function index($id)
    {
        // dd('111');

        $get_news = DB::table('news')
            ->select('news.*', 'news_images.news_image_url', 'news_images.news_image_name')
            ->leftJoin('news_images', 'news_images.news_id_fk', '=', 'news.id')
            ->where('news.news_status', '=', "1")
            ->where('news.id', '=',$id)
            ->first();


        // dd($get_news);

        return view('frontend.news_detail', compact('get_news', 'id'));
    }
}
