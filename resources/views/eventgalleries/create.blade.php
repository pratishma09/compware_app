@extends('template')
@section('title', 'Our gallery')
@section('content')
    <h1>Create a gallery category.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="{{ route('eventgallery.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="gallery_name" class="mt-4">Title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " name="gallery_name"
                placeholder="Enter product title">
            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </span>

        </div>
        <div class="form-group">
            <label for="files" class="form-label mt-4">Upload Product Images:</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>
        <div class="mt-4">
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
