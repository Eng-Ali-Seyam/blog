@extends('layouts.dashboard')

@section('content')

    @if(count($categories))
    <form style="width: 80%; margin: 0 auto" method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control @error('main_title') is-invalid @enderror" name="main_title" placeholder="Main Title" value="{{old('main_title')}}">
            @error('main_title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group" >
            <label for="exampleFormControlInput1">Subtitle</label>
            <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" placeholder="Subtitle" value="{{old('sub_title')}}">
            @error('sub_title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="category" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea class="ckeditor form-control @error('news_content') is-invalid @enderror" id="editor" name="news_content" rows="5">{{old('news_content')}}</textarea>
            @error('news_content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label" value="{{old('image')}}">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" is="">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
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

@section('title','Add News')

