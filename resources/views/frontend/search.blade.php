@extends('frontend.layouts.main')

@section('content')
    <style>
        .search-result {
            margin: 3rem 0;
        }

        h2 {
            margin-top: 2rem;
            text-align: center;
        }

        .col_1_of_single1 {
            margin: 1% 0 1% 3.6% !important;
        }
    </style>

        <h2><u>Kết Quả Tìm Kiếm : {{$keyword}}</u></h2>
    <div class="search-result">
        @foreach($products as $product)
            <div class="col_1_of_single1 span_1_of_single1">
                <a href="{{route('home.detailProduct',['slug' => $product->slug])}}">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1" style="min-height: 34px">{{$product->name}}</h3>
                            <div class="grid_img">
                                <div class="css3"><img src="{{asset($product->image)}}" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
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
        <nav aria-label="Page navigation example">
            {{$products->links()}}
        </nav>
    </div>
    <div class="clear"></div>
@endsection
