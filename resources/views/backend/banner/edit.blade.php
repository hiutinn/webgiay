@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Sửa Thông Tin Banner<a href="{{route('admin.product.index')}}" class="btn bg-purple pull-right"><i
                    class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chỉnh sửa thông tin banner</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @if ($errors->any())
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h4><i class="icon fa fa-warning"></i> Cảnh báo !</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.banner.update', ['id' => $data->id ])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Tên ..." value="{{$data->title}}">
                                        @if ($errors->has('title'))
                                            <label class="text-red"
                                                   style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i
                                                    class="fa fa-info"></i> {{ $errors->first('title') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                                        <input type="file" id="image" name="image">
                                        @if($data->image)
                                            <img src="{{asset($data->image)}}" alt="" width="200">
                                        @endif
                                        @if ($errors->has('image'))
                                            <label class="text-red"
                                                   style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i
                                                    class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại Danh Mục</label>
                                        <select class="form-control" name="type">
                                            <option {{$data->type == 0 ? 'selected' : ''}} value="0">Sản Phẩm</option>
                                            <option {{$data->type == 1 ? 'selected' : ''}} value="1">Bài Viết</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{$data->position}}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input {{$data->is_active == 1 ? 'checked' : ''}} type="checkbox" value="1" name="is_active"><b>Trạng thái hiển thị</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputSupplier">Tùy chỉnh liên kết Url</label>
                                <input type="text" class="form-control" id="name" name="url" placeholder="" value="{{$data->url}}">
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter ...">{!! $data->description !!}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_js')
    <script type="text/javascript">
        $(function () {
            var _ckeditor = CKEDITOR.replace('description');
            _ckeditor.config.height = 300;
        })
        {{--$(function () {--}}
        {{--    var _ckeditor = CKEDITOR.replace('editor1', {--}}
        {{--        filebrowserBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html') }}',--}}
        {{--        filebrowserImageBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Images') }}',--}}
        {{--        filebrowserFlashBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',--}}
        {{--        filebrowserUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',--}}
        {{--        filebrowserImageUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',--}}
        {{--        filebrowserFlashUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'--}}
        {{--    });--}}
        {{--    _ckeditor.config.height = 200;--}}
        {{--})--}}

        {{--$(function () {--}}
        {{--    var _ckeditor = CKEDITOR.replace('editor2');--}}
        {{--    _ckeditor.config.height = 200;--}}
        {{--})--}}

    </script>
@endsection
