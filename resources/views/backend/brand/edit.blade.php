@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Thương Hiệu
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">QL Thương Hiệu</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm Thương Hiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.brand.update', ['id' => $data->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <!-- left column -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tên Thương Hiệu</label>
                                        <input value="{{$data->name}}" type="text" class="form-control" id="name" placeholder="Nhập tên..."
                                               name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Ảnh</label>
                                        <input type="file" id="image" name="image" >
                                        @if ($data->image)
                                            <img src="{{asset($data->image)}}" alt="" width="150">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input value="{{$data->website}}" type="text" class="form-control" id="website"
                                               placeholder="Nhập website..."
                                               name="website">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position"
                                               value="{{$data->position}}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input {{($data->is_active == 1) ? 'checked' : ''}} type="checkbox" id="is_active" name="is_active" value="1"> Trạng thái
                                    hoạt động
                                </label>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->


            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
