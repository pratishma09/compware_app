@extends('template')
@section('title', 'Our team')
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
    <form method="post" action="{{route('client.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Photo</label>
            <input type="file" name="client_image" class="" placeholder="Client Image">
        </div>
        <div>
            <label class="">Name</label>
            <input type="text" class="" name="client_name" placeholder="Client Name">
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection
