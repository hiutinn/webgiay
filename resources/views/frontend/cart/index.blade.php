@extends('frontend.layouts.main')

@section('content')

    <div class="register_account">
        <div class="wrap">
            <h2 style="text-align: center;margin: 2rem"><u>Thông Tin Giỏ Hàng</u></h2>
            <form>
                <div class="row">
                    {{-- Thông Tin Sản Phẩm --}}

                    <div class="col-md-12" id="my-cart">
                        @include('frontend.components.cart')
                    </div>

                </div>

            </form>
        </div>
        <div class="clear"></div>

    </div>


@endsection

