@extends('template')
@section('title', 'Blogs Today')
@section('content')
    <h1>Create a blog post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{ route('requestcertificate.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>

        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>

        <div>
            <label class="form-label">Startdate</label>
            <input type="date" name="startdate" class="form-control" placeholder="startdate">
        </div>
        <div>
            <label class="form-label">End date</label>
            <input type="date" name="enddate" class="form-control" placeholder="enddate">
        </div>
        <div>
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact">
        </div>
        <div>
            <label class="form-label">Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="Duration">
        </div>
        <div>
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="team_id">Team:</label>
            <select name="team_id" id="team_id" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
