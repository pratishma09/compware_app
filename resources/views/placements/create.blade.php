@extends('template')
@section('title', 'Our team')
@section('content')
    <h1>Create a placement post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('placement.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Photo</label>
            <input type="file" name="placement_image" class="" placeholder="Placement Image">
        </div>
        <div>
            <label class="">Name</label>
            <input type="text" class="" name="placement_name" placeholder="Placement Name">
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection