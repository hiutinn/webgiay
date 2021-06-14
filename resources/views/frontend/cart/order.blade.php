@extends('frontend.layouts.main')

@section('content')
    <div class="register_account">
        @if(!session('msg'))
        <div class="wrap">
            <h4 class="title text-center">Create an Account</h4>
            <form action="{{ route('home.cart.postOrder') }}" class="billing-form" method="post">
                @csrf
                <div class="col-md-6 offset-md-3">
                    <div><input name="fullname" type="text" value="Tên" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Tên';}">
                        @if ($errors->has('fullname'))
                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('fullname') }}</label>
                        @endif
                    </div>
                    <div><input name="phone" type="text" value="Điện Thoại" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Điện Thoại';}">
                        @if ($errors->has('phone'))
                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('phone') }}</label>
                        @endif
                    </div>
                    <div><input name="email" type="text" value="E-Mail" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'E-Mail';}">
                        @if ($errors->has('email'))
                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('email') }}</label>
                        @endif
                    </div>
                    <div><input name="address" type="text" value="Địa Chỉ" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Địa Chỉ';}">
                        @if ($errors->has('address'))
                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('address') }}</label>
                        @endif
                    </div>
                    <div>
                        <textarea style="border: 1px solid #f0f0f0;color: #999" name="note" id="" cols="78" rows="5" placeholder="Ghi chú"></textarea>
                    </div>
                    <button type="submit" class="grey">Đặt hàng</button>
                </div>

                <div class="clear"></div>
            </form>
        </div>

        @else
            {{ session('msg') ? session('msg') : '' }}
        @endif
    </div>
@endsection

