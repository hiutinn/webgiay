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

    // Lấy thông tin trang chủ
    public function index()
    {
        $categories = Category::where(['is_active' => 1])->orderBy('position', 'ASC')->get();
        $banners = Banner::where(['is_active' => 1])->orderBy('position', 'ASC')->get();
        // Lấy sản phẩm hot
        $hot_pros = Product::where(['is_hot' => 1])->orderBy('position', 'ASC')->get();
        // Lấy sản phẩm mới nhất
        $new_pros = Product::where(['is_active' => 1])->limit(12)
            ->orderBy('id', 'desc')
            ->orderBy('position', 'ASC')
            ->get();

        return view('frontend.index',
            [
                'categories' => $categories,
                'banners' => $banners,
                'hot_pros' => $hot_pros,
                'new_pros' => $new_pros,
            ]
        );
    }

    // Trang liên hệ.
    public function contact()
    {
        return view('frontend.contact');
    }

    // Thêm liên hệ vào DB
    public function postContact(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required'
        ], [
            'name.required' => 'Bạn cần nhập vào tên !',
            'email.required' => 'Bạn cần nhập vào địa chỉ email !',
            'email.email' => 'Địa chỉ email không hợp lệ !'
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
        $productsCategory = Category::where(['type' => 0])->get();

        $product = Product::where(['is_active' => 1, 'slug' => $slug])->first();

        $sameProducts = Product::where([
            ['is_active', '=', 1],
            ['id', '<>', $product->id],
            ['category_id', '=', $product->category_id]
        ])->orderBy('id', 'desc')
            ->orderBy('position', 'ASC')
            ->limit(4)
            ->get();


        return view('frontend.product.detail', [
            'product' => $product,
            'sameProducts' => $sameProducts,
            'productsCategory' => $productsCategory
        ]);
    }

    // Lấy sản phẩm theo danh mục
    public function getProductsByCategory($slug)
    {
        $productsCategory = Category::where(['type' => 0])->get();
        $category = Category::where(['is_active' => 1, 'slug' => $slug])->first();

        if ($category) {
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = []; // mảng lưu toàn id của danh mục cha + id - danh mục con

            $ids[] = $category->id; // 1
            $child_categories = []; // lưu danh mục con

            foreach ($productsCategory as $child) {
                if ($child->parent_id == $category->id) {
                    $ids[] = $child->id; // thêm id của danh mục con vào mảng ids
                    $child_categories[] = $child;
                }
            }

            // Lấy sản phẩm theo danh mục
            $products = Product::where
            ([
                'is_active' => 1
            ])
                ->whereIn('category_id', $ids) // category_id = những id đã lấy được ở trên
                ->orderBy('id', 'desc') // Sắp xếp theo id tăng dần
                ->paginate(6);

            return view('frontend.product.category',
                [
                    'products' => $products,
                    'productsCategory' => $productsCategory,
                    'slug' => $slug,
                    'category' => $category
                ]
            );
        }
    }

    // Lấy danh sách bài viết
    public function getListArticles()
    {
        $articles = Article::latest()->paginate(5);
        return view('frontend.article.articleList',
            [
                'articles' => $articles
            ]
        );
    }

    // Lấy chi tiết bài viết
    public function getArticle($id)
    {
        $article = Article::find($id);

        $sameArticles = Article::where([
            ['is_active', '=', 1],
            ['id', '!=', $article->id],
            ['category_id', '=', $article->category_id]
        ])->orderBy('id', 'desc')
            ->orderBy('position', 'ASC')
            ->limit(4)
            ->get();
        return view('frontend.article.article',
            [
                'article' => $article,
                'sameArticles' => $sameArticles
            ]
        );
    }

    // Tìm kiếm
    public function search(Request $request)
    {
        $keyword = $request->input('key');

        $slug = str_slug($keyword);

        $products = Product::where([
            ['slug' , 'like' , '%' . $slug . '%'],
            ['is_active','=',1]
        ])
            ->paginate(6);

        $totalResult = $products->total(); // số lượng kết quả tìm kiếm

        return view('frontend.search',
        [
            'products' => $products,
            'keyword' => $keyword,
            'totalResult' => $totalResult
        ]
        );
    }

}
