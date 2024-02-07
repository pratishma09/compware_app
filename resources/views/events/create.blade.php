@extends('template')
@section('title', 'Our team')
@section('content')
    <h1>Create an event post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Photo</label>
            <input type="file" name="event_image" class="" placeholder="Event Image">
        </div>
        <div>
            <label class="">Name</label>
            <input type="text" class="" name="event_name" placeholder="Name">
        </div>
        <div>
            <label class="form-label">Episode</label>
            <input type="radio" name="event_ep" class="" value="I">I
            <input type="radio" name="event_ep" class="" value="II">II
        </div>
        <div>
            <label class="form-label">Role</label>
            <input type="radio" name="event_role" class="" value="Panelist">Panelist
            <input type="radio" name="event_role" class="" value="II">Host & Moderator
        </div>
        <div>
            <label class="">Description</label>
            <textarea type="text" class="" name="event_desc" cols="100"></textarea>
        </div>
        <button type="submit" class="">Submit</button>
    </form>
@endsection
