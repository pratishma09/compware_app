@extends('template')
@section('title', 'Courses')

@section('content')

    <body>
        <h1>Edit the course post.</h1>
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
                <input type="file" name="course_logo" class="form-control" value="{{ $courses->course_logo ?? '' }}">
            </div>
            <div>
                <label class="form-label">pdf</label>
                <input type="file" name="course_pdf" class="form-control" placeholder="course pdf"
                    value="{{ $courses->course_pdf ?? '' }}">
            </div>
            <div>
                <label>Name</label>
                <input type="text" name="course_name" value="{{ $courses->course_name ?? '' }}">
            </div>
            <div>
                <label class="">Start Date</label>
                <input type="date" name="course_startdate" class="" placeholder="Course Startdate"
                    value={{$courses->course_startdate}}>
            </div>
            <div>
                <label class="">End Date</label>
                <input type="date" name="course_enddate" class="" placeholder="Course Enddate"
                    value={{$courses->course_enddate}}>
            </div>
            <div>
                <label class="form-label">Schedule</label>
                <input type="radio" name="course_schedule" class="" value="Morning"
                    {{ $courses->course_schedule == 'morning' ? 'checked' : '' }}>Morning
                <input type="radio" name="course_schedule" class="" value="Evening"
                    {{ $courses->course_schedule == 'evening' ? 'checked' : '' }}>Evening
                <input type="radio" name="course_schedule" class="" value="Afternoon"
                    {{ $courses->course_schedule == 'afternoon' ? 'checked' : '' }}>Afternoon
            </div>
            <div>
                <label class="">Course Fee</label>
                <input type="number" name="course_fee" class="" placeholder="Fee" value={{$courses->course_fee}}>
            </div>
            <div>
                <label for="coursecategory_id">Course Category:</label>
                <select name="coursecategory_id" id="coursecategory_id" required>
                    @foreach ($coursecategories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == $courses->coursecategory_id ? 'selected' : '' }}>
                            {{ $category->coursecategory_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="team_id">Team:</label>
                <select name="team_id" id="team_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $courses->team_id ? 'selected' : '' }}>
                            {{ $team->team_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Description</label>
                <textarea name="course_desc" id="course_description" cols="100" rows="5">{{ $courses->course_desc ?? '' }}</textarea>
            </div>
            <div>
                <button type="submit">Update</button>

        </form>
    @endsection
    @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#course_description' ) )
            .catch( (error) => {
                console.error( error );
            } );
    </script>
    @endsection
    