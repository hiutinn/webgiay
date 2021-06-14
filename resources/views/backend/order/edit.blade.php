@extends('backend.layouts.main')

@section('content')
    <style>
        #thongbao {
            position: absolute;
            margin-bottom: 0px;
            width: 350px;
            z-index: 1000;
            float: right;
            right: 22px;
        }
    </style>
    <section class="content-header">
        <h1>
            QL Đơn Hàng <a href="{{ route('admin.order.index') }}" class="btn bg-purple btn-flat"><i
                    class="fa fa-fw fa-bars"></i>
                Danh Sách</a>
        </h1>
        <ol class="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Chi Tiết Đơn Hàng</li>
            </ol>
        </ol>
    </section>
    @if (session('msg'))
        <div class="pad margin no-print">
            <div class="alert alert-success alert-dismissable" id="thongbao">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>Thông Báo !</h4>
                {{ session('msg') }}
            </div>
        </div>
    @endif
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.order.update',['id'=>$order->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Mã ĐH</th>
                                    <td>{{ $order->code }}</td>
                                    <th>Ngày</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>

                                <tr>
                                    <th>Họ Tên</th>
                                    <td>{{ $order->fullname }}</td>
                                    <th>SĐT</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ $order->email }}</td>
                                    <th>Tổng Tiền</th>
                                    <td>{{ number_format($order->total,0,",",".") }} VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Địa Chỉ</th>
                                    <td>{{ $order->address }}</td>
                                    <th>Địa Chỉ Nhận Hàng</th>
                                    <td>
                                        <div class="form-group">
                                            <input value="{{ $order->address2 }}" class="form-control" type="text" name="address2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ghi Chú</th>
                                    <td colspan="">
                                        <div class="form-group">
                                            <textarea name="" id="" cols="50" rows="5" value="{{ $order->note }}">{{ $order->note }}</textarea>
                                        </div>

                                    </td>
                                    <th>Trạng Thái</th>
                                    <td>
                                        <select name="order_status_id" id="">
                                            @foreach($order_status as $status)
                                                    <option value="{{ $status->id }}" {{ $order->order_status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </form>
                    <!--/ form end -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><b>#</b></th>
                                <th scope="col"><b>Ảnh</b></th>
                                <th scope="col"><b>Tên Sản Phẩm</b></th>
                                <th scope="col"><b>Giá</b></th>
                                <th scope="col"><b>Số Lượng</b></th>
                                <th scope="col"><b>Tổng Cộng</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->details as $detail)
                                <tr>
                                    <td class="detail-remove">
                                        <a data-id="{{ $detail->rowId }}" href="javascript:void(0)"
                                           class="btn btn-danger cart_quantity_delete remove-to-cart"
                                           title="Xóa sản phẩm">x
                                        </a>
                                    </td>
                                    <td><img src="{{asset($detail->image)}}" width="150" alt=""></td>
                                    <td>{{$detail->name}}</td>
                                    <td>{{number_format($detail->price,0,",",".")}} VNĐ</td>
                                    <td class="qty">
                                        {{ $detail->qty }}
                                        {{--                                            <input type="text" value="{{$detail->qty}}" class="item-qty">--}}
                                        {{--                                            <br>--}}
                                        {{--                                            <a href="javascript:void(0)" class="btn-update"--}}
                                        {{--                                               style="color: orangered;text-decoration: none"--}}
                                        {{--                                               data-id="{{ $detail->rowId }}">Cập nhật</a>--}}
                                    </td>
                                    <td>{{number_format($detail->price*$detail->qty,0,",",".")}} VNĐ</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

