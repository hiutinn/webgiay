<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="/frontend/images/f_icon.png" alt=""/><span class="delivery">Miễn Phí Giao Hàng Với Đơn Hàng Trên 1000VNĐ*</span>
                    </li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="/frontend/images/f_icon1.png" alt=""/><span class="delivery">Chăm Sóc Khách Hàng :<span
                                class="orange">{{$setting->hotline}}</span></span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="/frontend/images/f_icon2.png" alt=""/><span class="delivery">Giao Hàng Nhanh, Trả Hàng Miễn Phí</span>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');

        .footer-bottom {
            background: linear-gradient(0deg, #fff, 50%, #DEEEFE);
            font-family: 'Rubik', sans-serif;
            background: #455A64;
        }

        .fb-box {
            overflow: hidden;
            background: black;
            color: #627482 !important;
            margin-bottom: 0;
            padding-bottom: 0
        }

        small {
            font-size: calc(12px + (15 - 12) * ((100vw - 360px) / (1600 - 360))) !important
        }

        .bold-text {
            color: #989c9e !important
        }

        .mt-55 {
            margin-top: calc(50px + (60 - 50) * ((100vw - 360px) / (1600 - 360))) !important
        }

        .footer-bottom h3 {
            font-size: calc(34px + (40 - 34) * ((100vw - 360px) / (1600 - 360))) !important
        }

        .social {
            font-size: 21px !important
        }

        .social a {
            text-decoration: none;
            color: #989c9e;
            cursor: pointer;
        }

        .footer-menu a {
            text-decoration: none;
            color: #627482;
            cursor: pointer;
        }

        .footer-menu a:hover {
            color: #989c9e;
        }

        /*.rights {*/
        /*    font-size: calc(10px + (12 - 10) * ((100vw - 360px) / (1600 - 360))) !important*/
        /*}*/
    </style>
    <div class="footer-bottom">
        <div class="wrap">
            <div class="fb-box pb-0 mb-0 justify-content-center text-light ">
                <div class="row my-5 justify-content-center py-5">
                    <div class="col-11">
                        <div class="row ">
                            <div class="col-xl-6 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                                <h3 class="text-muted mb-md-0 mb-5 bold-text">Something</h3>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-4 col-12">
                                <h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
                                <ul class="list-unstyled footer-menu">
                                    <li><a href="/">Home</a></li>
                                    @foreach($categories as $cate)
                                        @if($cate->parent_id == 0)
                                            <li><a href="">{{$cate->name}}</a></li>
                                        @endif
                                    @endforeach
                                    <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-4 col-12">
                                <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                                <p class="mb-1">{{$setting->address}}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div
                                class="col-xl-6 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                                <div class="social text-muted mb-0 pb-0 bold-text row">
                                    <a class="col-md-4">
                                        <i class="fa fa-fw fa-facebook" aria-hidden="true"></i></a>
                                    <a class="col-md-4">
                                        <i class="fa fa-fw fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a class="col-md-4">
                                        <i class="fa fa-fw fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div>
                                {{--                                <small--}}
                                {{--                                    class="rights"><span>&#174;</span> Pepper All Rights Reserved.</small>--}}
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                <h6 class="mt-55 mt-2 text-muted bold-text"><b>EMAIL</b></h6><small> <span><i
                                            class="fa fa-envelope" aria-hidden="true"></i></span>
                                    {{$setting->email}}</small>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                                <h6 class="text-muted bold-text"><b>PHONE</b></h6><small><span><i
                                            class="fa fa-envelope" aria-hidden="true"></i></span>
                                    {{$setting->phone}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

