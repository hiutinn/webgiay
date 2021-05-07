@extends('frontend.layouts.main')
@section('content')
    <div class="login">
        <div class="wrap">
            <div class="col_1_of_login span_1_of_login">
                <img src="/image/something.png" alt="">
                <div class="clear"></div>
            </div>
            <div class="col_1_of_login span_1_of_login">
                <div class="login-title">
                    <h4 class="title">Contact</h4>
                    <div class="comments-area">
                        <form action="{{route('home.postContact')}}" method="post">
                            @csrf
                            <p>
                                <label>Tên</label>
                                <span>*</span>
                                <input type="text" value="" name="name" placeholder="Your name">
                                @if ($errors->has('name'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info" style="color: red"></i> {{ $errors->first('title') }}</label>
                                @endif
                            </p>
                            <p>
                                <label>Email</label>
                                <span>*</span>
                                <input type="text" value="" name="email" placeholder="abc@gmail.com">
                                @if ($errors->has('email'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info" style="color: red"></i> {{ $errors->first('title') }}</label>
                                @endif
                            </p>
                            <p>
                                <label>Số Điện Thoại</label>
                                <span>*</span>
                                <input type="text" value="" name="phone" placeholder="0123456789">
                                @if ($errors->has('phone'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info" style="color: red"></i> {{ $errors->first('title') }}</label>
                                @endif
                            </p>
                            <p>
                                <label>Tin Nhắn</label>
                                <textarea name="content" id="" cols="100" rows="10" placeholder="Write your message"></textarea>
                            </p>
                            <p>
                                <input type="submit" value="Gửi">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
