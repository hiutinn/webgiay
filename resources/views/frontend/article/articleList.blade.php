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

        .article .row {
            padding: 1.5%;
            margin-bottom: 2rem;
            border-bottom: 1px solid #ccc;
        }

        .col-md-9 h3 {
            color: red;
        }

        .col-md-9 h4 span a {
            text-decoration: underline;
        }

        .col-md-9 h4,
        .col-md-9 h4 a {
            font-size: 0.95em;
            color: #303030;
            padding-bottom: 5px;
        }

        .banner-content {
            position: relative;
            top: 20%;
        }

        .breadcrumb {
            background: #cccccc;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .breadcrumb a {
            color: black;
            text-decoration: none;
    </style>
    <div class="article">

        <div class="container">
            <div style="height: 20rem; width: 100%; background: #cccccc; padding: 4rem;position: relative" class="banner">
                <div class="banner-content">
                    <h1 style="margin: 0rem;text-align: center"><u>Bài Viết</u></h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Trang Chủ</a></li>
                        <li>/</li>
                        <li>Bài Viết</li>
                    </ul>
                </div>
            </div>
            @foreach($articles as $article)
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{route('home.article.detail',['id'=>$article->id])}}"><img
                                src="{{asset($article->image)}}" alt=""></a>
                    </div>
                    <div class="col-md-9">
                        <a href="{{route('home.article.detail',['id'=>$article->id])}}" style="text-decoration: none;">
                            <h3>{{$article->title}}</h3></a>
                        <h4>Posted on {{$article->created_at}}
                            {{--                        <span><a href="#">Finibus Bonorum</a></span>--}}
                        </h4>
                        <p>{!! $article->summary !!}<a href="{{route('home.article.detail',['id'=>$article->id])}}"
                                                       title="more">[....]</a></p>
                    </div>
                </div>
            @endforeach
            <nav aria-label="Page navigation example">
                {{$articles->links()}}
            </nav>
        </div>

    </div>
@endsection
