@extends('layouts.dashboard')

@section('content')

@if(count($categories))
<form style="width: 80%; margin: 0 auto" method="post" action="{{route('news.update',$news->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" name="main_title" placeholder="Main Title" value="{{$news->main_title}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Subtitle</label>
        <input type="text" class="form-control" name="sub_title" placeholder="Subtitle" value="{{$news->sub_title}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1" value="{{$news->main_title}}">Category</label>
        <select class="form-control" name="category">
            @foreach($categories as $category)
            @if($category->id == $news->category_id)
                    <option value="{{$category->id}}" selected>
                        <span class="material-symbols-outlined">{{$category->icon_name}}</span> {{$category->name}}
                    </option>
                @else
                    <option value="{{$category->id}}">
                        <span class="material-symbols-outlined">{{$category->icon_name}}</span> {{$category->name}}
                    </option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1" ></label>
        <textarea class="ckeditor form-control" name="news_content" rows="5" id="editor">{{$news->content}}</textarea>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label" >Image</label>
        <input class="form-control" type="file" name="image" value="{{asset('images/news/'.$news->image_path)}}">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@else
<div class="card text-bg-warning mb-3" style="max-width: 18rem; margin: 0 auto">
    <div class="card-header">Warning</div>
    <div class="card-body">
        <h5 class="card-title">No Category</h5>
        <p class="card-text">You Should add category to add news</p>
    </div>
</div>
@endif


@endsection

@section('title','Update News')

