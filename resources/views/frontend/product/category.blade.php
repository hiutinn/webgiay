@extends('frontend.layouts.main')

@section('content')
    <h2 style="margin: 4rem;text-align: center"><u>Sản Phẩm</u></h2>
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
                                        @if($cate->slug == $slug)
                                        <a href="{{ route('home.category', ['slug' => $cate->slug]) }}" style="text-decoration: none; color: black"><b>{{$cate->name}}</b></a>
                                        @else
                                        <a href="{{ route('home.category', ['slug' => $cate->slug]) }}" style="text-decoration: none; color: black">{{$cate->name}}</a>
                                        @endif
                                </label>
                                @foreach($productsCategory as $child)
                                    <ul style="margin-left: 1rem">
                                        @if($child->parent_id == $cate->id)
                                            <label class="checkbox">
                                                @if($child->slug == $slug)
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
    <div class="cont span_2_of_3" style="margin-bottom: 6rem">
        <div class="mens-toolbar">
            <div class="sort">
                <div class="sort-by">
                    <label>Sort By</label>
                    <select>
                        <option value="">
                            Popularity
                        </option>
                        <option value="">
                            Price : High to Low
                        </option>
                        <option value="">
                            Price : Low to High
                        </option>
                    </select>
                    <a href=""><img src="/frontend/images/arrow2.gif" alt="" class="v-middle"></a>
                </div>
            </div>
            {{--            <div class="pager">--}}
            {{--                <div class="limiter visible-desktop">--}}
            {{--                    <label>Show</label>--}}
            {{--                    <select>--}}
            {{--                        <option value="" selected="selected">--}}
            {{--                            9--}}
            {{--                        </option>--}}
            {{--                        <option value="">--}}
            {{--                            15--}}
            {{--                        </option>--}}
            {{--                        <option value="">--}}
            {{--                            30--}}
            {{--                        </option>--}}
            {{--                    </select> per page--}}
            {{--                </div>--}}
            {{--                <div class="clear"></div>--}}
            {{--            </div>--}}
            <div class="clear"></div>
        </div>

        <h2 style="text-align: center;margin: 2rem">{{$category->name}}</h2>
        @foreach($products as $product)
            <div class="col_1_of_single1 span_1_of_single1">
                <a href="{{route('home.detailProduct',['slug' => $product->slug])}}">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1" style="min-height: 34px">{{$product->name}}</h3>
                            <div class="grid_img">
                                <div class="css3"><img src="{{asset($product->image)}}" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">+ Giỏ Hàng</div>
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
                </a></div>
        @endforeach
        <div class="clear"></div>
        <nav aria-label="Page navigation example" style="margin: 2rem">
            {{$products->links()}}
        </nav>
    </div>
        <div class="clear"></div>
@endsection
