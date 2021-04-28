<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(15);
        return view('backend.product.index',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $users = User::all();
        return view('backend.product.create',
            [
                'categories' => $categories,
                'brands' => $brands,
                'users' => $users,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Bạn cần phải nhập vào tên sản phẩm !',
            'stock.required' => 'Bạn cần phải nhập vào số lượng sản phẩm !',
            'price.required' => 'Bạn cần phải nhập vào giá sản phẩm !',
            'category_id.required' => 'Bạn cần phải nhập vào danh mục của sản phẩm !',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg !',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->url = $request->input('url');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->slug = str::slug($request->input('name'), '-');
        $product->brand_id = $request->input('brand_id');


        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time() . '_' . $file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'upload/product/';
            // upload file
            $request->file('image')->move($path_upload, $filename);

            $product->image = $path_upload . $filename;
        }

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $product->position = $position;

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $product->is_active = $is_active;

        $is_hot = 0;
        if ($request->has('is_hot')) {
            $is_hot = $request->input('is_hot');
        }
        $product->is_hot = $is_hot;

        $product->save();

        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.edit', [
            'data' => $data,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Bạn cần phải nhập vào tên sản phẩm !',
            'stock.required' => 'Bạn cần phải nhập vào số lượng sản phẩm !',
            'price.required' => 'Bạn cần phải nhập vào giá sản phẩm !',
            'category_id.required' => 'Bạn cần phải nhập vào danh mục của sản phẩm !',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg !',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->url = $request->input('url');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->slug = str::slug($request->input('name'), '-');
        $product->brand_id = $request->input('brand_id');

        if ($request->hasFile('image')) {
            // Lấy file
            $file = $request->file('image');
            // Lấy tên
            $filename = time() . '_' . $file->getClientOriginalName();
            // Đường dẫn upload
            $path_upload = 'upload/product/';
            // Upload file
            $request->file('image')->move($path_upload, $filename);

            $product->image = $path_upload . $filename;
        }

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $product->position = $position;

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $product->is_active = $is_active;

        $is_hot = 0;
        if ($request->has('is_hot')) {
            $is_hot = $request->input('is_hot');
        }
        $product->is_hot = $is_hot;

        $product->save();

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Product::destroy($id); // true | false

        if ($isDelete) {
            return response()->json(['success' => 1, 'message' => 'Thành công']); // { 'success':1, 'message' : 'Thành công' }
        } else {
            return response()->json(['success' => 0, 'message' => 'Thất bại']);
        }
    }
}
