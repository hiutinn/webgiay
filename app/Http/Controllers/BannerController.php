<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        return view('backend.banner.index',
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
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'description' => 'required',
        ], [
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->url = $request->input('url');
        $banner->type = $request->input('type');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/banner/';
            $file->move($path_upload, $filename);
            $banner->image = $path_upload . $filename;
        }

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $banner->position = $position;

        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;
        $banner->description = $request->input('description');

        $banner->save();

        return redirect()->route('admin.banner.index');
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
        $data = Banner::find($id);
        return view('backend.banner.edit', [
            'data' => $data
        ]);
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
        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->url = $request->input('url');
        $banner->type = $request->input('type');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/banner/';
            $file->move($path_upload, $filename);
            $banner->image = $path_upload . $filename;
        }

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $banner->position = $position;

        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;
        $banner->description = $request->input('description');

        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Banner::destroy($id); // true | false

        if ($isDelete) {
            return response()->json(['success' => 1, 'message' => 'Thành công']); // { 'success':1, 'message' : 'Thành công' }
        } else {
            return response()->json(['success' => 0, 'message' => 'Thất bại']);
        }
    }
}
