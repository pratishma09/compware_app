@extends('template')
@section('title', 'Course Category')
@section('content')
    <h1>Create a clients post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('coursecategory.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Name</label>
            <input type="text" class="" name="coursecategory_name" placeholder="Course Category Name">
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection
