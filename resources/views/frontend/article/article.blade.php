@extends('frontend.layouts.main')

@section('content')
    <style>
        body {
            font-size: 16px;
        }

        .article {
            margin: 4rem;
        }

        .article h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 4rem;
        }

    </style>
    <div class="article">
        <div class="container">
            <div class="article">
                <h2><u>Tin Tức</u></h2>
                <h3 class="text-uppercase" style="color: red">{{$data->title}}</h3>
                <br>
                <h5>{!! $data->summary !!}</h5>

                <img src="{{asset($data->image)}}" alt="">
                <p>
                    {!! $data->desciption !!} </p>
            </div>

            <div class="sameArticle">
                <h3>Tin tức liên quan</h3>
                <br>
                <div class="row">
                    <div class="col-md-3" style="border: 1px solid #cccccc;margin: 0rem">
                        <a href=""><img src="{{asset($data->image)}}" alt=""></a>
                        <a href=""><h6 style="color: red;text-decoration: none;margin-top: 1rem">àdjakfjasjfa</h6></a>
                    </div>
                    <div class="col-md-3 offset-md-1" style="border: 1px solid #cccccc">
                        <a href=""><img src="{{asset($data->image)}}" alt=""></a>
                        <a href=""><h6 style="color: red;text-decoration: none;margin-top: 1rem">àdjakfjasjfa</h6></a>
                    </div>
                    <div class="col-md-3 offset-md-1" style="border: 1px solid #cccccc">
                        <a href=""><img src="{{asset($data->image)}}" alt=""></a>
                        <a href=""><h6 style="color: red;text-decoration: none;margin-top: 1rem">àdjakfjasjfa</h6></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
