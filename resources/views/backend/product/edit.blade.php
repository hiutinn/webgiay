@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm sản phẩm mới <a href="{{route('admin.product.index')}}" class="btn bg-purple pull-right"><i
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
                        <h3 class="box-title">Thông tin sản phẩm</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
                    <form role="form" action="{{route('admin.product.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputSupplier">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên ..." value="{{$data->name}}">
                                    @if ($errors->has('name'))
                                        <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoryOption">Thương Hiệu</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="select"> -- chọn Thương Hiệu --</option>
                                        @foreach($brands as $brand)
                                            <option {{$data->brand_id == $brand->id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock">Số lượng trong kho</label>
                                        <input type="text" class="form-control" id="stock" name="stock" value="{{$data->stock}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh sản phẩm</label>
                                    <input type="file" id="image" name="image">
                                    @if ($data->image)
                                        <img src="{{asset($data->image)}}" width="200">
                                    @endif
                                    @if ($errors->has('image'))
                                        <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                    @endif
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Giá gốc (vnđ)</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Giá khuyến mãi (vnđ)</label>
                                        <input type="text" class="form-control" id="sale" name="sale" value="{{$data->sale}}">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoryOption">Danh mục sản phẩm</label>
                                        <select class="form-control" name="category_id">
                                            <option value=""> -- chọn Danh Mục --</option>
                                            @foreach($categories as $category)
                                                    <option
                                                        {{ ($data->category_id == $category->id ? 'selected':'') }} value="{{ $category -> id }}">{{ $category -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position"
                                               value="{{$data->position}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active) ? 'checked':'' }}><b>Trạng thái hiển thị</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_hot" {{ ($data->is_hot) ? 'checked':'' }}><b>Sản phẩm nổi bật</b>
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
                                <label>Tóm tắt</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3"
                                          placeholder="Enter ..." value="">{!! $data->summary !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter ..." >{!! $data->description !!}</textarea>
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
            var _ckeditor1 = CKEDITOR.replace('summary');
            _ckeditor1.config.height = 300;
            var _ckeditor2 = CKEDITOR.replace('description');
            _ckeditor2.config.height = 600;
        })
{{--        $(function () {--}}
{{--            var _ckeditor = CKEDITOR.replace('editor1', {--}}
{{--                filebrowserBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html') }}',--}}
{{--                filebrowserImageBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Images') }}',--}}
{{--                filebrowserFlashBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',--}}
{{--                filebrowserUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',--}}
{{--                filebrowserImageUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',--}}
{{--                filebrowserFlashUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'--}}
{{--            });--}}
{{--            _ckeditor.config.height = 200;--}}
{{--        })--}}

{{--        $(function () {--}}
{{--            var _ckeditor = CKEDITOR.replace('editor2');--}}
{{--            _ckeditor.config.height = 200;--}}
{{--        })--}}

    </script>
@endsection
