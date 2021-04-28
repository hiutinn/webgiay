@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            QL Người Dùng <a type="button" class="btn btn-primary" href="{{route('admin.user.index')}}"><i class="fa fa-fw fa-bars"></i>Danh Sách</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">QL Người Dùng</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm Người Dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chọn Quyền</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">--chọn--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Manager</option>
                                        <option value="3">Member</option>
                                    </select>
                                    @if($errors->has('role_id'))
                                        <label class="text-red" style="font-weight: 600;font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                            {{ $errors->first('role_id') }}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Họ Tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="name">
                                    @if($errors->has('name'))
                                        <label class="text-red" style="font-weight: 600;font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                        {{ $errors->first('name') }}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
                                    @if($errors->has('email'))
                                        <label class="text-red" style="font-weight: 600;font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                            {{ $errors->first('email') }}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật Khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập password">
                                    @if($errors->has('password'))
                                        <label class="text-red" style="font-weight: 600;font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                            {{ $errors->first('password') }}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" id="avatar" name="avatar">
                                    @if($errors->has('avatar'))
                                        <label class="text-red" style="font-weight: 600;font-size: 15px; margin-top: 5px"> <i class="fa fa-info"></i>
                                            {{ $errors->first('avatar') }}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="is_active" name="is_active" value="1">
                                            Kích hoạt tài khoản
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
