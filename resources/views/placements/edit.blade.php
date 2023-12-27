@extends('template')
@section('title', 'Our placement')
@section('content')
    <h1>Edit the placements post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="update" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label class="form-label">Photo</label>
            <input type="file" name="placement_image" class="" value="{{$placements->placement_image??''}}">
        </div>
        <div>
            <label class="form-label">Name</label>
            <input type="text" class="" name="placement_name" value="{{$placements->placement_name??''}}">
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection
