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
                    <form role="form" action="{{route('admin.category.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <!-- left column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Danh Mục Cha</label>
                                        <select class="form-control" name="parent_id">
                                            @foreach($dataAll as $item)
                                                <option {{($data->parent_id == $item->id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                                <option {{$data->parent_id == 0 ? 'selected' : '' }} value="0">Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại Danh Mục</label>
                                        <select class="form-control" name="type">
                                            <option value="0" {{($data->type == 0) ? 'selected' : ''}}>Sản Phẩm</option>
                                            <option value="1" {{($data->type == 1) ? 'selected' : ''}}>Bài Viết</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên Danh Mục</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên DM" name="name" value="{{$data->name}}">
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
                                    <img src="{{ asset($data->image) }}" alt="" width="100" style="margin-top: 10px;">
                                </div>
                                <div class="form-group">
                                    <label for="position">Vị trí</label>
                                    <input type="number" class="form-control" id="position" name="position" value="{{$data->position}}">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input {{ ($data->is_active == 1) ? 'checked' : '' }} type="checkbox" id="is_active" name="is_active"> Trạng thái hoạt động
                                    </label>
                                </div>
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
