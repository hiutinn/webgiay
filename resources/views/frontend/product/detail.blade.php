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
                            @foreach($productsCategory as $cate)
                                @if($cate->parent_id == 0)
                                    <li>
                                        <label class="checkbox">
                                                <a href="{{ route('home.category', ['slug' => $cate->slug]) }}" style="text-decoration: none; color: black">{{$cate->name}}</a>
                                        </label>
                                        @foreach($productsCategory as $child)
                                            <ul style="margin-left: 1rem">
                                                @if($child->parent_id == $cate->id)
                                                    <label class="checkbox">
                                                        @if($child->id == $product->category_id)
                                                            <a href="{{ route('home.category', ['slug' => $child->slug]) }}" style="text-decoration: none; color: black"><b>{{$child->name}}</b></a>
                                                        @else
                                                            <a href="{{ route('home.category', ['slug' => $child->slug]) }}" style="text-decoration: none; color: black">{{$child->name}}</a>
                                                        @endif
                                                    </label>
                                                @endif
                                            </ul>
                                        @endforeach
                                    </li>
                                @endif
                            @endforeach
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
                        <form action="{{ route('home.cart.add-to-cart',['id'=>$product->id]) }}">
                            <input type="submit" value="Thêm sản phẩm vào giỏ hàng" title="Thêm sản phẩm vào giỏ hàng">
                        </form>
                    </div>
{{--                    <ul class="add-to-links">--}}
{{--                        <li><img src="images/wish.png" alt=""/><a href="#">Add to wishlist</a></li>--}}
{{--                    </ul>--}}
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
                                            <div class="grid_img">
                                                <div class="css3"><a
                                                        href="{{route('home.detailProduct',['slug' => $product->slug])}}"><img
                                                            src="{{asset($product->image)}}" alt=""/></a></div>
                                                <div class="mask">
                                                    <div class="info"><a href=""
                                                                         style="text-decoration: none;color: #FFFFFF">+ Giỏ Hàng</a></div>
                                                </div>
                                            </div>
                                            <div class="old-price">
                                                <a href="{{route('home.detailProduct',['slug' => $product->slug])}}"
                                                   style="text-decoration: none;color: black">
                                                    <del>{{number_format($product->price,0,",",".") }} VNĐ</del>
                                                </a>
                                            </div>
                                            <div class="price">
                                                <a href="{{route('home.detailProduct',['slug' => $product->slug])}}"
                                                   style="text-decoration: none;color: goldenrod">
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
                </div>


            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
