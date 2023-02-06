@extends('layouts.home_layout')

@section('content')

    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{asset('images/news/'.$news->image_path)}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$news->main_title}}</h1>
                        <h2 class="subheading">{{$news->sub_title}}</h2>
                        <span class="meta">
                                Posted by
                                <a href="#!">{{$news->name}}</a>
                                {{$news->created_at}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <p>
                    {!! $news->content !!}
                </p>
            </div>
        </div>
    </article>


@endsection

@section('title','Post')
