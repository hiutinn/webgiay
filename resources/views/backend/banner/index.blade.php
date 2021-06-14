@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Banner <a href="{{route('admin.banner.create')}}" class="btn bg-purple"><i
                    class="fa fa-plus"></i> Thêm Banner</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">DS Banner</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin danh sách Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>TT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Kiểu</th>
                                <th>Url</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="15%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item -> title }}</td>
                                    <td>{{ $item -> type == 0 ? 'Sản Phẩm' : 'Bài Viết' }}</td>
                                    <td>{{ $item -> url }}</td>
                                    <td>{!! $item->description  !!}</td>
                                    <td>{{ $item->is_active == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.banner.edit', ['id' => $item->id ]) }}"
                                           class="btn btn-flat bg-purple">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        <button data-id="{{$item->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
                        url: '/admin/banner/' + id, // http://webthucpham.local:8888/user/8
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {},
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {
                            //  PHP : $user->name
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
        });
    </script>
@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#example1').DataTable();--}}
{{--            $('#example2').DataTable({--}}
{{--                'paging'      : true,--}}
{{--                'lengthChange': false,--}}
{{--                'searching'   : false,--}}
{{--                'ordering'    : true,--}}
{{--                'info'        : true,--}}
{{--                'autoWidth'   : false--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
