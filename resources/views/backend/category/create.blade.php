@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">QL Danh Mục</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm Danh Mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <!-- left column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Danh Mục Cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Không</option>
                                            @foreach($data as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại Danh Mục</label>
                                        <select class="form-control" name="type">
                                            <option value="0">Sản Phẩm</option>
                                            <option value="1">Bài Viết</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên Danh Mục</label>
                                        <input required type="text" class="form-control" id="name" placeholder="Nhập tên DM"
                                               name="name">
                                        @if ($errors->has('name'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <!--/.col (left) -->

                            <!-- right column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Ảnh</label>
                                    <input type="file" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="position">Vị trí</label>
                                    <input type="number" class="form-control" id="position" name="position" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is_active" name="is_active" value="1"> Trạng thái hoạt động
                                    </label>
                                </div>
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                    <!--/ form end -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
