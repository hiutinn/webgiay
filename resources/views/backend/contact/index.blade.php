@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Liên Hệ <a href="{{ route('admin.category.create') }}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i>
                Thêm</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">DS Liên Hệ</li>
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
                                <th>Tên</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Nội Dung</th>
                                <th>Hành Động</th>
                            </tr>

                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->content}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit', ['id' => $item->id ]) }}"
                                           class="btn btn-flat bg-purple"><i class="fa fa-pencil"></i></a>
                                        <button data-id="{{ $item->id }}" class="btn btn-danger btn-delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
{{--                        {{ $data->links() }}--}}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

@section('my_js')
    <script type="text/javascript">
        $(document).ready(function () {
            // Thiết lập csrf => chổng giả mạo
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('.btn-delete').on('click', function () {

                let id = $(this).data('id');

                let result = confirm("Bạn có chắc chắn muốn xóa ?");

                if (result) { // neu nhấn == ok , sẽ send request ajax

                    $.ajax({
                        url: '/admin/category/' + id, // http://webthucpham.local:8888/category/8
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {
                            // dữ liệu truyền sang nếu có
                        },
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {
                            //  PHP : $category->name
                            //  JS: res.name

                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                $('.item-' + id).remove();
                            }
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e);
                        }
                    });
                }

            });

            /*$( ".btn-delete" ).click(function() {
                alert( "Handler for .click() called." );
            });*/

        });
    </script>
@endsection


