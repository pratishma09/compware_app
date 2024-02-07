{{-- @extends('template')
@section('title', 'Our courses')
@section('content')
    <h1>Create a team post.</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="">Course Logo</label>
            <input type="file" name="course_logo" class="" placeholder="Course logo">
        </div>
        <div>
            <label class="">Course Details(PDF Format)</label>
            <input type="file" name="course_pdf" class="" placeholder="Course pdf">
        </div>
        <div>
            <label class="">Name</label>
            <input type="text" class="" name="course_name" placeholder="Course Name">
        </div>
        <div>
            <label class="">Start Date</label>
            <input type="date" name="course_startdate" class="" placeholder="Course Startdate">
        </div>
        <div>
            <label class="">End Date</label>
            <input type="date" name="course_enddate" class="" placeholder="Course Enddate">
        </div>
        <div>
            <label class="form-label">Schedule</label>
            <input type="radio" name="course_schedule" class="" value="Morning">Morning
            <input type="radio" name="course_schedule" class="" value="Evening">Evening
            <input type="radio" name="course_schedule" class="" value="Afternoon">Afternoon
        </div>
        <div>
            <label class="">Course Fee</label>
            <input type="number" name="course_fee" class="" placeholder="Fee">
        </div>
        <div>
            <label class="">Description</label>
            <textarea name="course_desc" id="course_description"></textarea>
        </div>
        <div>
            <label for="coursecategory_id">Course Category</label>
            <select name="coursecategory_id" id="coursecategory_id" required>
                @foreach ($coursecategories as $coursecategory)
                    <option value="{{ $coursecategory->id }}">{{ $coursecategory->coursecategory_name }}</option>
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
        <button type="submit" class="">Submit</button>
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

  --}}
