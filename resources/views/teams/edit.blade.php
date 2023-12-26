@extends('template')
@section('title', 'Blogs Today')

@section('content')
<body>
    <h1>Edit the team post.</h1>
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
            <input type="file" name="team_image" class="form-control" value="{{ $teams->team_image ?? '' }}">
        </div>
        <div>
            <label class="form-label">Signature</label>
            <input type="file" name="team_signature" class="form-control" placeholder="Team Signature" value="{{ $teams->team_signature ?? '' }}">
        </div>
        <div>
        <label>Name</label>
        <input type="text" name="team_name" value="{{$teams->team_name ?? ''}}">
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="team_email" value="{{$teams->team_email??''}}">
            </div>
            <div>
                <label class="form-label">Post</label>
                <input type="radio" name="team_post" class="" value="team" {{ $teams->team_post == 'team' ? 'checked' : '' }}>Team
                <input type="radio" name="team_post" class="" value="trainer" {{ $teams->team_post == 'trainer' ? 'checked' : '' }}>Trainer
                </div>
            <div>
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="team_role" value="{{$teams->team_role??''}}">
                </div>
        <div>
        <label>Description</label>
        <textarea name="team_description" cols="100" rows="5">{{$teams->team_description ?? ''}}</textarea>
        </div>
        <div>
        <button type="submit">Update</button>
        
    </form>
@endsection