<div class="header-bottom">
    <style>

    </style>
    <div class="wrap d-flex">
        <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li><a class="color1" href="/">Home</a></li>
            @foreach($categories as $cate)
                @if($cate->parent_id == 0)
                    <li class="grid"><a class="color1" href="{{($cate->type == 0) ? route('home.category',['slug'=>$cate->slug]) : route('home.article')}}">{{$cate->name}}</a>
                        <div class="megapanel">
                            @foreach($categories as $child)
                                        <div class="h_nav">
                                            <ul>
                                                @if($child->parent_id == $cate->id)
                                                    <li><a href="{{($child->type == 0) ? route('home.category',['slug'=>$child->slug]) : route('home.article')}}"><h4>{{$child->name}}</h4></a></li>
                                                @endif
                                            </ul>
                                        </div>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
            <li class="grid"><a class="color1" href="{{route('home.contact')}}">Liên Hệ</a></li>
        </ul>
        <form class="form-inline" style="margin-left: 4rem" action="{{route('home.search')}}" method="get" enctype="multipart/form-data">
            <input value="{{isset($keyword) ? $keyword : ''}}" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="key">
            <button class="btn my-2 my-sm-0 btn-dark" type="submit">Search</button>
        </form>
        <div class="clear"></div>
    </div>
</div>
