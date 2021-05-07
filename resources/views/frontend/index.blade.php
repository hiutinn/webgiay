@extends('frontend.layouts.main')
@section('content')
    <div class="index-banner">
        <div class="wmuSlider example1" style="height: 560px;">
            <div class="wmuSliderWrapper">
                @foreach($banners as $banner)
                <article style="position: relative; width: 100%; opacity: 1;">
                    <div class="banner-wrap">
                        <div class="slider-left">
                            <img src="{{asset($banner->image)}}" alt="" width="100%"/>
                        </div>
                        <div class="slider-right">
                            <h3>{{$banner->title}}</h3>
                            <p>{!! $banner->description !!}</p>
                            <div class="btn"><a href="{{route('home.detailProduct', ['slug' => str_slug($banner->title)])}}">Shop Now</a></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </article>
                @endforeach
            </div>
            <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
            <ul class="wmuSliderPagination">
                <li><a href="#" class="">0</a></li>
                <li><a href="#" class="">1</a></li>
                <li><a href="#" class="wmuActive">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
            <ul class="wmuSliderPagination">
                <li><a href="#" class="wmuActive">0</a></li>
                <li><a href="#" class="">1</a></li>
                <li><a href="#" class="">2</a></li>
                <li><a href="#" class="">3</a></li>
                <li><a href="#" class="">4</a></li>
            </ul>
        </div>
        <script src="/frontend/js/jquery.wmuSlider.js"></script>
        <script type="text/javascript" src="/frontend/js/modernizr.custom.min.js"></script>
        <script>
            $('.example1').wmuSlider();
        </script>
    </div>
    <div class="top_bg">
        <div class="wrap">
            <div class="main1">
                <div class="image1_of_3">
                    <img src="/image/Nike.png" alt="">
                    <a href="{{route('home.category', ['slug' => 'giay-nike'])}}" style="text-decoration: none; width: 350px; height: 230px"><span class="tag">Nike</span></a>
                </div>
                <div class="image1_of_3">
                    <img src="/image/Vans.png" alt="">
                    <a href="{{route('home.category', ['slug' => 'giay-vans'])}}" style="text-decoration: none; width: 350px; height: 230px"><span class="tag">Vans</span></a>
                </div>
                <div class="image1_of_3">
                    <img src="/image/Converse.png" alt="">
                    <a href="{{route('home.category', ['slug' => 'giay-converse'])}}" style="text-decoration: none; width: 350px; height: 230px"><span class="tag">Converse</span></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="wrap">
            <div class="content-bottom">
                <style>
                    .box1 .top_box h3 {
                        min-height: 34px;
                    }
                </style>
                {{--                Hot products--}}
                <div class="box1">
                    <p class="box1-title">Hot!</p>
                    <u><p style="text-align: center;font-size: 2rem;">Sản phẩm nổi bật </p></u>
                    <div class="owl-carousel owl-theme">
                        @foreach($hot_pros as $product)
                        <div class="item">
                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}">
                                <div class="view view-fifth">
                                    <div class="top_box">
                                        <h3 class="m_1">{{$product->name}}</h3>
                                        <div class="grid_img">
                                            <div class="css3"><a href="{{route('home.detailProduct',['slug' => $product->slug])}}"><img src="{{$product->image}}" alt=""/></a></div>
                                            <div class="mask">
                                                <div class="info"><a href="" style="text-decoration: none;color: #FFFFFF">+ Giỏ Hàng</a></div>
                                            </div>
                                        </div>
                                        <div class="old-price">
                                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}" style="text-decoration: none;color: black">
                                                <del>{{number_format($product->price,0,",",".") }} VNĐ</del>
                                            </a>
                                        </div>
                                        <div class="price">
                                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}" style="text-decoration: none;color: goldenrod">
                                                {{number_format($product->sale,0,",",".") }} VNĐ
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>

                {{--                New products--}}
                <div class="box1">
                    <p class="box1-title">New!</p>
                    <u><p style="text-align: center;font-size: 2rem;">Sản phẩm mới</p></u>
                    <div class="owl-carousel owl-theme">
                        @foreach($new_pros as $product)
                        <div class="item">
                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}">
                                <div class="view view-fifth">
                                    <div class="top_box">
                                        <h3 class="m_1">{{$product->name}}</h3>
                                        <div class="grid_img">
                                            <div class="css3"><img src="{{asset($product->image)}}" alt=""/></div>
                                            <div class="mask">
                                                <div class="info">+ Giỏ Hàng</div>
                                            </div>
                                        </div>
                                        <div class="old-price">
                                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}" style="text-decoration: none;color: black">
                                                <del>{{number_format($product->price,0,",",".") }} VNĐ</del>
                                            </a>
                                        </div>
                                        <div class="price">
                                            <a href="{{route('home.detailProduct',['slug' => $product->slug])}}" style="text-decoration: none;color: goldenrod">
                                                {{number_format($product->sale,0,",",".") }} VNĐ
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>

                {{--                About Us--}}
                <div class="box1">
                    <div class="box1-title">
                        <p>About Us!</p>
                    </div>
                    <u><p style="text-align: center;font-size: 2rem;">ThÔng Tin Về ChÚng Tôi</p></u>

                    <div class="row" style="margin: 2rem 0; text-align: justify">
                        <div class="col-md-5">
                            {!! $setting->introduce !!}
                        </div>

                        <div class="col-md-4 offset-md-3">
                            <img src="/image/something.png" alt="" width="100%" style="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
