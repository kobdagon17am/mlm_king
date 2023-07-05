<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public static function product_detail($type, $id)
    {
        // dd('111');
        // $business_location_id = Auth::guard('c_user')->user()->business_location_id;

        if (empty($id) || empty($type)) {
            return redirect('cart_general/general')->withError('No Product');
        } else {


            $product = DB::table('products')
                ->select(
                    'products.*',
                    'product_images.*',
                )
                ->leftjoin('product_images', 'product_images.product_id_fk', '=', 'products.id')
                ->where('products.id', '=', $id)
                ->first();
            // dd($product);
            
            if (empty($product)) {
                return redirect('cart_general/' . $type)->withError('No Product');
            } else {
                $img = DB::table('product_images')
                    ->where('product_id_fk', '=', $id)
                    // ->orderby('product_image_orderby', 'DESC')
                    ->get();
            }
            // dd($img);
            $data = [
                'product_data' => $product,
                'img' => $img,
                'type' => $type
            ];
            // dd($data);
            return view('frontend/cart_general_detail', compact('data'));
        }
    }
}
