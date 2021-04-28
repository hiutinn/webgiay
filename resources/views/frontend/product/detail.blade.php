@extends('frontend.layouts.main')

@section('content')
    <style>
        .single {
            margin: 4rem 0;
        }

        .toogle {
            margin: 4rem 0;
        }
    </style>
    <div class="single">
        <div class="wrap">
            <div class="rsidebar span_1_of_left">
                <section class="sky-form">
                    <h4>Danh Mục</h4>
                    <div class="row scroll-pane" style="outline:none;
	padding: 20px;
	overflow: auto;">
                        <ul>
                            <li>
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox" checked="">
                                    <i></i>Tất cả
                                </label>
                            </li>
                            <li>
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <i></i>Nike
                                </label>
                                <ul style="margin-left: 1rem">
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>Air Force
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>Jordan
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>SB Dunk
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>Air Max
                                    </label>
                                </ul>
                            </li>
                            <li>
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <i></i>Converse
                                </label>
                                <ul style="margin-left: 1rem">
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>1970s
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox">
                                        <i></i>CDG
                                    </label>
                                </ul>
                            </li>
                            <li>
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <i></i>Vans
                                </label>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="cont span_2_of_3">
                <h2 style="text-align: center; margin-bottom: 2rem;"><u>Chi Tiết Sản Phẩm</u></h2>
                <div class="labout span_1_of_a1">
                    <img src="{{asset($product->image)}}" alt="">
                </div>
                <div class="cont1 span_2_of_a1">
                    <h3 class="m_3">{{$product->name}}</h3>

                    <div class="price_single">
                        <span class="reducedfrom">{{ number_format($product->price,0,",",".") }} VNĐ</span>
                        <span class="actual">{{ number_format($product->sale,0,",",".") }} VNĐ</span>
{{--                        <a href="#">click--}}
{{--                            for offer</a>--}}
                    </div>
{{--                    <ul class="options">--}}
{{--                        <h4 class="m_9">Select a Size</h4>--}}
{{--                        <li><a href="#">6</a></li>--}}
{{--                        <li><a href="#">7</a></li>--}}
{{--                        <li><a href="#">8</a></li>--}}
{{--                        <li><a href="#">9</a></li>--}}
{{--                        <div class="clear"></div>--}}
{{--                    </ul>--}}
                    <div class="btn_form">
                        <form action="{{route('home.cart')}}">
                            <input type="submit" value="buy now" title="">
                        </form>
                    </div>
                    <ul class="add-to-links">
                        <li><img src="images/wish.png" alt=""/><a href="#">Add to wishlist</a></li>
                    </ul>
                    <p class="m_desc">{!! $product->summary !!}</p>

                    <div class="social_single">
                        <ul>
                            <li class="fb"><a href="#"><span> </span></a></li>
                            <li class="tw"><a href="#"><span> </span></a></li>
                            <li class="g_plus"><a href="#"><span> </span></a></li>
                            <li class="rss"><a href="#"><span> </span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="toogle">
                    <h4 class="text-uppercase">Mô tả sản phẩm</h4>
                    <p class="m_text">{!! $product->description !!}</p>
                </div>

                <div class="sameProducts">
                    <h4 class="text-uppercase">Sản phẩm liên quan</h4>
                    <div class="owl-carousel owl-theme">
                        @foreach($sameProducts as $product)
                            <div class="item"><a href="{{route('home.detailProduct',['slug' => $product->slug])}}">
                                    <div class="view view-fifth">
                                        <div class="top_box">
                                            <h3 class="m_1">{{$product->name}}</h3>
                                            <p class="m_2">Lorem ipsum</p>
                                            <div class="grid_img">
                                                <div class="css3"><a
                                                        href="{{route('home.detailProduct',['slug' => $product->slug])}}"><img
                                                            src="{{asset($product->image)}}" alt=""/></a></div>
                                                <div class="mask">
                                                    <div class="info"><a href=""
                                                                         style="text-decoration: none;color: #FFFFFF">Quick
                                                            View</a></div>
                                                </div>
                                            </div>
                                            <div class="price"><a
                                                    href="{{route('home.detailProduct',['slug' => $product->slug])}}"
                                                    style="text-decoration: none;color: goldenrod">{{number_format($product->price,0,",",".") }}
                                                    VNĐ</a></div>
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
