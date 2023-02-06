@extends('layouts.home_layout')

@section('content')

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($news as $news_post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('show',$news_post->id)}}">
                            <h2 class="post-title">{{$news_post->main_title}}</h2>
                            <h3 class="post-subtitle">{{$news_post->sub_title}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{$news_post->name}}</a>
                            {{$news_post->created_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{route('register')}}">Create your Posts →</a></div>
            </div>
        </div>
    </div>



@endsection

@section('title','Home')

