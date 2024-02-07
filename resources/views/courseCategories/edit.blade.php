@extends('template')
@section('title', 'Course Category')
@section('content')
    <h1>Edit the client post.</h1>
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
            <label class="form-label">Name</label>
            <input type="text" class="" name="coursecategory_name" value="{{$coursecategories->coursecategory_name??''}}">
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection
