@extends('layouts.dashboard')

@section('content')
    <form style="width: 80%; margin: 0 auto" method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Main Title">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Icon Name</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Subtitle">
            @error('icon')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
@section('title','Add Category')
