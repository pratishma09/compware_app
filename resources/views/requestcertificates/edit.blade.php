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
    <form method="post" action="update" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $requestcertificates->name ?? '' }}">
        </div>

        <div>
            <label class="form-label">Startdate</label>
            <input type="date" class="form-control" name="startdate" value="{{ $requestcertificates->startdate ?? '' }}">
        </div>

        <div>
            <label class="form-label">Enddate</label>
            <input type="date" class="form-control" name="enddate" value="{{ $requestcertificates->enddate ?? '' }}">
        </div>

        <div>
            <label class="form-label">Duration</label>
            <input type="text" class="form-control" name="duration" value="{{ $requestcertificates->duration ?? '' }}">
        </div>

        <div>
            <label class="form-label">Contact</label>
            <input type="text" class="form-control" name="contact"
                value="{{ $requestcertificates->contact ?? '' }}">
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email"
                value="{{ $requestcertificates->email ?? '' }}">
        </div>
        <div>
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" value="{{ $course->id ?? '' }}" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="team_id">Team:</label>
            <select name="team_id" id="team_id" value="{{ $team->id ?? '' }}" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
