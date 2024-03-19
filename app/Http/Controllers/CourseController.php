<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\Team;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function index(Request $request)
// {
//     try {
//         $teams = Team::all();
//         $coursecategories = Coursecategory::all();

//         $selectedCategories = $request->input('coursecategory', []);

//         if (!is_array($selectedCategories)) {
//             $selectedCategories = explode(',', $selectedCategories);
//         }

//         $selectedCategories = array_filter($selectedCategories);

//         $searchQuery = $request->input('search', '');

//         $query = Course::query();

//         if (!empty($selectedCategories)) {
//             $query->whereIn('coursecategory_id', $selectedCategories);
//         }

//         if ($searchQuery) {
//             $query->where('course_name', 'like', '%' . $searchQuery . '%');
//         }

//         // Paginate the results
//         $courses = $query->paginate(10); // Paginate with 10 items per page, adjust as needed

//         // Render the course list HTML separately
//         $courseListHTML = view('courses.course_list')->with('courses', $courses)->render();

//         return view('courses.index')->with(compact('courseListHTML', 'courses', 'teams', 'coursecategories'));

//     } catch (Exception $e) {
//         return back()->with('error', 'Something went wrong!');
//     }
// }

    public function index(Request $request)
    {
        try {
            $teams = Team::all();
            $coursecategories = Coursecategory::all();
            $courses = Course::all();
            return view('user.courses.index')->with(compact('courses', 'coursecategories', 'teams'));
        } catch (Exception $e) {

            return back()->with('error', 'Something went wrong!');
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

            return redirect(route('admin.courses.list'))->with('success', 'Course created successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
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
        $courses = Course::all();
        $coursess = Course::where('course_slug', $slug)->firstOrFail();
        $course = Course::latest()->take(3)->get();
        try {
            return view('user.courses.show', ['courses' => $courses, 'coursess' => $coursess, 'course' => $course])->with(compact('course', 'courses', 'coursess'));
        } catch (ModelNotFoundException $e) {

            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            // Handle other exceptions
            return back()->with('error', 'Something went wrong!');
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
        try {
            $course = Course::findOrFail($id);
            $teams = Team::all();
            $coursecategories = Coursecategory::all();
            return view('admin.courses.edit', compact('course', 'teams', 'coursecategories'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
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

            if ($request->hasFile('course_logo')) {

                if ($course->course_logo && file_exists(public_path('assets/' . $course->course_logo))) {
                    unlink(public_path('assets/' . $course->course_logo));
                }

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
            return redirect(route('admin.courses.list'))->with('success', 'Course updated successfully');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Database error!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
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
        try {
            $course = Course::findOrFail($id);
            $course->delete();
            return redirect(route('admin.courses.list'))->with('success', 'Course deleted successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return back()->with('error', 'Cannot delete the course because it has related records.');
            }
            return back()->with('error', 'Something went wrong!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function home()
    {
        $courses = Course::all();
        return $courses;
    }

    public function search(Request $request)
    {
        try {
            $teams = Team::all();
            $coursecategories = Coursecategory::all();

            $search = $request->input('search');
            if ($search) {
                $courses = Course::where('course_name', 'like', "%$search%")->get();
            } else {
                $courses = Course::all();
            }
            return view('user.courses.index', compact('courses', 'coursecategories', 'teams'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function coursecategories(Request $request)
    {
        try {
            $teams = Team::all();
            $coursecategories = Coursecategory::all();

            $selectedCategories = $request->input('categories', []);

            $courses = Course::query();
            if (!empty($selectedCategories)) {
                $courses->where(function ($query) use ($selectedCategories) {
                    foreach ($selectedCategories as $category) {
                        $query->orWhere('coursecategory_id', $category->id);
                    }
                });
            }
            $courses = $courses->get();
            return view('user.courses.index', compact('courses', 'coursecategories', 'teams'));
        } catch (Exception $e) {
            dd($e);
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow()
    {
        $courses = Course::paginate(10);
        $teams = Team::all();
        $coursecategories = Coursecategory::all();
        return view('admin.courses.list')->with(compact('courses', 'teams', 'coursecategories'));
    }

}
