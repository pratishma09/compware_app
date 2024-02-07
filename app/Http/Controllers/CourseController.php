<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\Team;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $teams = Team::all();
            $coursecategories = Coursecategory::all();

            // Get selected categories from the request
            $selectedCategories = $request->input('coursecategory', []);

            // Ensure $selectedCategories is an array
            if (!is_array($selectedCategories)) {
                // If it's not an array, explode it using the comma as a separator
                $selectedCategories = explode(',', $selectedCategories);
            }

            // Remove empty values from $selectedCategories
            $selectedCategories = array_filter($selectedCategories);

            // Get search query from the request
            $searchQuery = $request->input('search', '');

            // Start with a base query
            $query = Course::query();

            // Apply category filters
            if (!empty($selectedCategories)) {
                $query->whereIn('coursecategory_id', $selectedCategories);
            }

            // Apply search query filter
            if ($searchQuery) {
                $query->where('course_name', 'like', '%' . $searchQuery . '%');
            }

            // Get the final result
            $courses = $query->get();
            $courseListHTML = view('courses.course_list')->with('courses', $courses)->render();

            // If not an AJAX request, return the full view
            return view('courses.index')->with(compact('courseListHTML', 'courses', 'teams', 'coursecategories'));

        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        $teams = Team::all();
        $coursecategories = Coursecategory::all();
        return view('admin.courses.create')->with(compact('courses', 'teams', 'coursecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        //
        try {
            $data = $request->validated();

            if ($request->hasFile('course_logo')) {
                $filenameI = 'course_logo_' . uniqid() . '_' . time() . '.' . $request->file('course_logo')->getClientOriginalExtension();
                $request->file('course_logo')->move(public_path('assets'), $filenameI);
                $data['course_logo'] = $filenameI;
            }
            if ($request->hasFile('course_pdf')) {
                $filenameS = 'course_pdf_' . uniqid() . '_' . time() . '.' . $request->file('course_pdf')->getClientOriginalExtension();
                $request->file('course_pdf')->move(public_path('assets'), $filenameS);
                $data['course_pdf'] = $filenameS;
            }
            $course = Course::create($data);

            return redirect(route('course.index'))->with('success', 'Course created successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Courses not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $course = Course::where('course_slug', $slug)->firstOrFail();
        $courses = Course::latest()->take(3)->get();
        try {
            return view('courses.show', ['courses' => $courses, 'course' => $course])->with(compact('course', 'courses'));
        } catch (ModelNotFoundException $e) {

            return response()->json(['error' => 'course not found'], 404);
        } catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courses = Course::where('id', $id)->first();
        $teams = Team::all();
        $coursecategories = Coursecategory::all();
        return view('courses.edit')->with(compact('courses', 'teams', 'coursecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        //
        try {
            $course = Course::findOrFail($id);
            $course->update($request->all());

            // Check if a new image is provided
            if ($request->hasFile('course_logo')) {
                // Delete the existing image if it exists
                if ($course->course_logo && file_exists(public_path('assets/' . $course->course_logo))) {
                    unlink(public_path('assets/' . $course->course_logo));
                }

                // Upload and save the new image
                $filenameI = 'course_logo_' . uniqid() . '_' . time() . '.' . $request->file('course_logo')->getClientOriginalExtension();
                $request->file('course_logo')->move(public_path('assets'), $filenameI);
                $course->update(['course_logo' => $filenameI]);
            }
            if ($request->hasFile('course_pdf')) {
                if ($course->course_pdf && file_exists(public_path('assets/' . $course->course_pdf))) {
                    unlink(public_path('assets/' . $course->course_pdf));
                }
                $filenameS = 'course_pdf_' . uniqid() . '_' . time() . '.' . $request->file('course_pdf')->getClientOriginalExtension();
                $request->file('course_pdf')->move(public_path('assets'), $filenameS);
                $course->update(['course_pdf' => $filenameS]);
            }
            // Update other fields
            return redirect(route('course.index'))->with('success', 'Courses updated successfully');
        } catch (ModelNotFoundException $e) {
            dd($e);
            return response()->json(['error' => 'Courses not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $course = Course::where('id', $id)->first();
            $course->delete();
            return redirect(route('course.index'))->with('success', 'Courses deleted successfully');
        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function search()
    {
        $courses = Course::all();
        return $courses;
    }

}
