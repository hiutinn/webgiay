<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // lấy dữ danh mục
        $categories = Category::where([
            'is_active' => 1
        ])->orderBy('position', 'ASC')->get();

//        // Danh mục
//        $menu = Category::where('is_active',1)->orderBy('position','ASC')
//            ->orderBy('id','DESC')->get();
//
//        $menu_brand = Brand::where('is_active',1)->orderBy('position','ASC')
//            ->orderBy('id','DESC')->get();
//
        // Cấu hình
        $setting = Setting::first();

        // chia sẻ dữ liệu qua nhiều view khác nhau
        view()->share([
            'categories' => $categories,
//            'menu_brand' => $menu_brand,
//            'menu' => $menu,
            'setting' => $setting,
        ]);
    }

//    public function getCart()
//    {
//        $cart = Cart::content();
//
//        return $cart;
//    }
}
