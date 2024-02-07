@extends('template')
@section('title', 'Edit Eventgallery')
@section('content')
    <h2>Edit Eventgallery</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ route('eventgallery.update', ['id' => $eventgallery->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="gallery_name">Gallery Name:</label>
            <input type="text" name="gallery_name" id="gallery_name" class="form-control" value="{{ $eventgallery->gallery_name }}">
        </div>

        <div class="form-group">
            <label for="images">Images:</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update Eventgallery</button>
    </form>
    
    <a href="{{ route('eventgallery.index') }}" class="btn btn-secondary mt-3">Go Back</a>
@endsection
