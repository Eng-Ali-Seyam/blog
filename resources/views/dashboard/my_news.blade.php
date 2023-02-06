@extends('layouts.dashboard')
@section('content')
    <!-- Main Content-->

        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($news as $news_post)

                    <!-- Post preview-->
                    <div class="card shadow-sm" style="margin: 10px 0">
                        <img class="card-img-top " src="{{asset('images/news/'.$news_post->image_path)}}" alt="image">
                        <div class="card-body">
                            <h3 class="card-text">{{$news_post->main_title}}</h3>
                            <p class="card-text">{{$news_post->sub_title}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{route('news.destroy',$news_post->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                    </form>
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('news.edit',$news_post->id)}}" >Edit</a>
                                </div>
                                <small class="text-muted">{{$news_post->created_at}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@endsection

@section('title','My News')

