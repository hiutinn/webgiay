<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\Product;
use App\Contact;
use App\Article;

class HomeController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $categories = Category::where(['is_active' => 1])->orderBy('position', 'ASC')->get();
        $banners = Banner::where(['is_active' => 1])->orderBy('position', 'ASC')->get();
        // Lấy sản phẩm hot
        $hot_pros = Product::where(['is_hot' => 1])->orderBy('position', 'ASC')->get();
        // Lấy sản phẩm mới nhất
        $new_pros = Product::where(['is_active'=>1])->limit(12)
            ->orderBy('id','desc')
            ->orderBy('position','ASC')
            ->get();

        return view('frontend.index',
        [
            'categories'=>$categories,
            'banners' => $banners,
            'hot_pros'=>$hot_pros,
            'new_pros'=>$new_pros,
        ]
        );
    }

    // Trang liên hệ.
    public function contact()
    {
        return view('frontend.contact');
    }

    public function postContact(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required'
        ], [
            'name.required' => 'Bạn cần nhập vào tên',
            'email.required' => 'Bạn cần nhập vào địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ'
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();
        return redirect()->route('home.contact')->with('msg', 'Bạn đã gửi tin nhắn thành công');
    }

    // Chi tiết sản phẩm.
    public function detailProduct($slug)
    {
        $product = Product::where(['is_active' => 1,'slug' => $slug])->first();

        $sameProducts  = Product::where([
            ['is_active', '=', 1],
            ['id','<>',$product->id],
            ['category_id','=',$product->category_id]
        ])->orderBy('id','desc')
            ->orderBy('position','ASC')
            ->limit(4)
            ->get();


        return view('frontend.product.detail',[
            'product' => $product,
            'sameProducts' => $sameProducts
        ]);
    }

    public function getProductsByCategory()
    {

        return view('frontend.product.category');
    }

    public function getListArticles()
    {
        $articles = Article::latest()->paginate(5);
        return view('frontend.article.articleList',
            [
                'articles' => $articles
            ]
        );
    }

    public function getArticle($id)
    {
        $data = Article::find($id);
        return view('frontend.article.article',
            [
                'data' => $data
            ]
        );
    }

}
