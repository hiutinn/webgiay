<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('backend.brand.index',
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
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([
          'name' => 'required|max:255'
              ]);

        $brand = New Brand();
        $brand->name = $request->input('name');
        $brand->website = $request->input('website');
        $brand->slug = str::slug($request->input('name')) ;
        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $brand->position = $position;

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'upload/brand/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename;
        }

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $brand->is_active = $is_active;

        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::find($id);
        return view('backend.brand.edit',
        [
            'data' => $data
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => 'Bạn cần nhập mục này!'
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->website = $request->input('website');
        $brand->slug = str::slug($request->input('name')) ;
        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $brand->position = $position;

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'upload/brand/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename;
        }

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $brand->is_active = $is_active;

        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Brand::destroy($id);

        if ($isDelete) {
            return response() -> json(['success' => 1]);
        } else {
            return response() -> json(['success' => 0]);
        }
    }
}
