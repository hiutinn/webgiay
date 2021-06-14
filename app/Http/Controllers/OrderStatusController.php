<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderStatus::all();
        return view('backend.orderStatus.index',
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
        return view('backend.orderStatus.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate (
            [
                'name' => 'required|max:255'
            ]
        );
        $orderStatus = new OrderStatus();
        $orderStatus->name = $request->input('name');
        $orderStatus->save();

        return redirect()->route('admin.orderStatus.index');
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
        $data = OrderStatus::find($id);
        return view('backend.orderStatus.edit',
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
        $request->validate (
            [
                'name' => 'required|max:255'
            ]
        );
        $orderStatus = OrderStatus::find($id);
        $orderStatus->name = $request->input('name');
        $orderStatus->save();

        return redirect()->route('backend.orderStatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = OrderStatus::destroy($id); // true | false

        if ($isDelete) {
            return response()->json(['success' => 1, 'message' => 'Thành công']); // { 'success':1, 'message' : 'Thành công' }
        } else {
            return response()->json(['success' => 0, 'message' => 'Thất bại']);
        }
    }
}
