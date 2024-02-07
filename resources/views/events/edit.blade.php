@extends('template')
@section('title', 'Blogs Today')

@section('content')

    <body>
        <h1>Edit the team post.</h1>
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
                <input type="file" name="event_image" class="form-control" value="{{ $event->event_image ?? '' }}">
            </div>
            <div>
                <label>Event</label>
                <input type="text" name="event_name" value="{{ $event->event_name ?? '' }}">
            </div>
            <div>
                <label class="form-label">Post</label>
                <input type="radio" name="event_ep" class="" value="I"
                    {{ $event->event_ep == 'I' ? 'checked' : '' }}>I
                <input type="radio" name="event_ep" class="" value="II"
                    {{ $event->event_ep == 'II' ? 'checked' : '' }}>II
            </div>
            <div>
                <label>Description</label>
                <textarea name="event_desc" cols="100" rows="5">{{ $event->event_desc ?? '' }}</textarea>
            </div>
            <div>
                <button type="submit">Update</button>

        </form>
    @endsection
