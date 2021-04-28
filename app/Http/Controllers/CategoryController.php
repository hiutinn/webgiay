<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->paginate(15);
        return view('backend.category.index',
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
        $data = Category::All();
        return view('backend.category.create',
            [
                'data' => $data
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
        ], [
            'name.required' => 'Bạn cần phải nhập vào tên !',
        ]);

        $category = new Category();
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');
        $category->name = $request->input('name');
        $category->slug = str::slug($request->input('name'), '-');
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'upload/category/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->position = $request->input('position');

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $category->is_active = $request->input('is_active');
        $category->save();

        return redirect()->route('admin.category.index');

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

        $data = Category::find($id);
        $dataAll = Category::All();

        return view('backend.category.edit', [
            'data' => $data,
            'dataAll' => $dataAll
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
        ], [
            'name.required' => 'Bạn cần phải nhập vào tên !',
        ]);

        $category = Category::find($id);
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');
        $category->name = $request->input('name');
        $category->slug = str::slug($request->input('name'), '-');
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->position = $request->input('position');

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        $category->save();

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Category::destroy($id);

        if ($isDelete) {
            return response() -> json(['success' => 1]);
        } else {
            return response() -> json(['success' => 0]);
        }
    }
}
