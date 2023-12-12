@extends('template')
@section('title','Blogs Today')
@section('content')
    <h1>Create a blog post.</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label">Photo</label>
            <input type="file" name="blogs_image" class="form-control" placeholder="Blog Image">
        </div>
        <div>
        <label class="form-label">Blog Name</label>
        <input type="text" class="form-control" name="blogs_name" placeholder="Title">
        </div>
        <div>
        <label class="form-label">Blog Author</label>
        <input type="text" name="blogs_author" class="form-control" placeholder="Author">
        </div>
        <div>
        <label class="form-label">Blog Description</label>
        <textarea name="blogs_desc" class="form-control">Description</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection