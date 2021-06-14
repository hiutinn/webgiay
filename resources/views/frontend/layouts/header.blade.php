<div class="header-top">
    <div class="wrap">
        <div class="logo">
            <a href="/"><img src="/image/something.png" alt=""></a>
        </div>
{{--        <div class="cssmenu">--}}
{{--            <ul>--}}
{{--                <li class="active"><a href="register.html">Đăng Ký</a></li>--}}
{{--                <li><a href="shop.html">Đăng Nhập</a></li>--}}
{{--                <li><a href="login.html">My Account</a></li>--}}
{{--                <li><a href="checkout.html">CheckOut</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="active-icon" href="{{route('home.cart')}}" ><i style="background-color: black; width: 26px; height: 26px; font-size: 1.5rem; border-radius: 5px" class="fa fas fa-shopping-cart"></i></a>
                <ul class="sub-icon2 list">
                    <li><h3>Giỏ hàng ({{ !empty(session('totalProduct')) ? session('totalProduct') : 0  }})</h3><a href=""></a></li>
                    <li><p> Giỏ hàng của bạn có {{ !empty(session('totalProduct')) ? session('totalProduct') : 0  }} sản phẩm</p></li>
                </ul>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
