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
                    <form role="form" action="{{route('admin.brand.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <!-- left column -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tên Thương Hiệu</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên..."
                                               name="name">
                                        @if ($errors->has('name'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Ảnh</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Website</label>
                                        <input type="text" class="form-control" id="website"
                                               placeholder="Nhập website..."
                                               name="website">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position"
                                               value="">
                                    </div>
                                </div>
                            </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is_active" name="is_active" value="1"> Trạng thái
                                        hoạt động
                                    </label>
                                </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
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
