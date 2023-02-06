@extends('layouts.dashboard')
@section('content')

    <form style="width: 80%; margin: 0 auto" method="post" action=" {{route('categories.update',$category->id)}}">
       @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name}}" >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Icon Name</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{$category->icon_name}}">
            @error('icon')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12" style="margin: 16px 0;">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
@section('title','Add Category')
