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
            font-weight: 700;
            margin-bottom: 4rem;
        }

    </style>
    <div class="article">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="new-title">{{ $article->title }}</h2>
                    <h5 style="margin: 15px 0px">{!! $article->summary !!}</h5><br>
                    {!! $article->description !!}

                </div>
            </div>

            <style>
                .sameArts-img {
                    max-height: 263px;
                    max-width: 350px;
                    overflow: hidden;
                }
            </style>
            <div class="sameArticle">
                <h3>Bài Viết Liên Quan</h3>
                <div class="row">
                    @foreach($sameArticles as $article)
                    <div class="col-6 col-sm-6 col-md-4">
                        <div class="clearfix margin-top-lg margin-bottom-lg">
                            <div class="margin-bottom sameArts-img">
                                <a href="" title="{{$article->title}}">
                                    <img src="{{asset($article->image)}}" alt="{{$article->title}}" title="{{$article->title}}" class="img-responsive">
                                </a>
                            </div>
                            <div class="caption">
                                <h4>
                                    <a href="" title="{{$article->title}}" style="text-decoration: none;color: black">
                                       {{$article->title}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
@endsection
