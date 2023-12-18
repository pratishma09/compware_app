@extends('template')
@section('title', 'Blogs Today')

@section('content')
<body>
    <h1>Edit the blog post.</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="update" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label class="form-label">Photo</label>
            <input type="file" name="blogs_image" class="form-control" placeholder="Blog Image" value="{{ $blog->blogs_image ?? '' }}">
        </div>
        <div>
        <label>Name</label>
        <input type="text" name="blogs_name" value="{{$blog->blogs_name ?? ''}}">
        </div>
        <div>
            <label class="form-label">Blog Slug</label>
            <input type="text" class="form-control" name="blogs_slug" value="{{$blog->blogs_slug??''}}">
            </div>
        <div>
        <label>Description</label>
        <textarea name="blogs_desc">{{$blog->blogs_desc ?? ''}}</textarea>
        </div>
        <div>
        <label>Author</label>
        <input type="text" name="blogs_author" value="{{$blog->blogs_author ?? ''}}">
        </div>
        <button type="submit">Update</button>
        
    </form>
@endsection