@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">DS Đơn Hàng</li>
            </ol>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh Sách Người Dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Ngày</th>
                                <th>Mã ĐH</th>
                                <th>Trạng Thái</th>
                                <th>Họ Và Tên</th>
                                <th>ĐT</th>
                                <th>Email</th>
                                <th>Tổng Tiền</th>
                                <th></th>
                            </tr>

                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        @if($item->order_status_id === 1)
                                            <span class="label label-info">Mới</span>
                                        @elseif($item->order_status_id === 2)
                                            <span class="label label-warning">Đang XL</span>
                                        @elseif($item->order_status_id === 3)
                                            <span class="label label-success">Hoàn Thành</span>
                                        @else
                                            <span class="label label-danger">Hủy</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->phone}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td><b>{{ $item->total}} VNĐ</b></td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.order.edit', ['id' => $item->id ]) }}"
                                           class="btn btn-flat bg-purple"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

{{--@section('my_js')--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            // Thiết lập csrf => chổng giả mạo--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            })--}}

{{--            $('.btn-delete').on('click', function () {--}}

{{--                let id = $(this).data('id');--}}

{{--                let result = confirm("Bạn có chắc chắn muốn xóa ?");--}}

{{--                if (result) { // neu nhấn == ok , sẽ send request ajax--}}

{{--                    $.ajax({--}}
{{--                        url: '/admin/category/' + id, // http://webthucpham.local:8888/category/8--}}
{{--                        type: 'DELETE', // phương truyền tải dữ liệu--}}
{{--                        data: {--}}
{{--                            // dữ liệu truyền sang nếu có--}}
{{--                        },--}}
{{--                        dataType: "json", // kiểu dữ liệu muốn nhận về--}}
{{--                        success: function (res) {--}}
{{--                            //  PHP : $category->name--}}
{{--                            //  JS: res.name--}}

{{--                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công--}}
{{--                                $('.item-' + id).remove();--}}
{{--                            }--}}
{{--                        },--}}
{{--                        error: function (e) { // lỗi nếu có--}}
{{--                            console.log(e);--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}

{{--            });--}}

{{--            /*$( ".btn-delete" ).click(function() {--}}
{{--                alert( "Handler for .click() called." );--}}
{{--            });*/--}}

{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}


