@extends('template')
@section('title','Our team')
@section('content')
    <h1>Create a team post.</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('team.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Photo</label>
            <input type="file" name="team_image" class="" placeholder="Team Image">
        </div>
        <div>
            <label class="">Signature</label>
            <input type="file" name="team_signature" class="" placeholder="Team Signature">
        </div>
        <div>
        <label class="">Name</label>
        <input type="text" class="" name="team_name" placeholder="Team Name">
        </div>
        <div>
            <label class="">Email</label>
            <input type="text" name="team_email" class="" placeholder="Email">
            </div>
        <div>
            <label class="form-label">Post</label>
            <input type="radio" name="team_post" class="" value="Team">Team
            <input type="radio" name="team_post" class="" value="Trainer">Trainer
            </div>
        <div>
        <label class="">Role</label>
        <input type="text" name="team_role" class="" placeholder="Role">
        </div>
        <div>
        <label class="">Description</label>
        <textarea name="team_description" class="" rows="5" cols="100"></textarea>
        </div>
        
        <button type="submit" class="">Submit</button>
    </form>
@endsection