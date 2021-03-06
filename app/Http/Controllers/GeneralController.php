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

        $this->categories = $categories;

        // Cấu hình
        $setting = Setting::first();

        // chia sẻ dữ liệu qua nhiều view khác nhau
        view()->share([
            'categories' => $categories,
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
