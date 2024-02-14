@extends('template')
@section('title','Blogs Today')
@section('content')
    <h1>Create a blog post.</h1>
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
            <input type="file" name="testimonial_image" class="form-control" value="{{ $testimonials->testimonial_logo ?? '' }}">
        </div>
        <div>
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="testimonial_name" value="{{ $testimonials->testimonial_name ?? '' }}">
        </div>
        
        <div>
        <label class="form-label">Testimonial Description</label>
        <textarea name="testimonial_desc" class="form-control" rows="5" cols="100">{{$testimonials->testimonial_desc ?? ''}}</textarea>
        </div>
        <div>
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection