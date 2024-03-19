<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Course;
use App\Models\Enroll;
use App\Http\Requests\EnrollRequest;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enrolls = Enroll::all();
        $courses = Course::all();
        return view('user.enrolls.index', compact('enrolls','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enrolls = Enroll::all();
        $courses = Course::all();
        return view('user.enrolls.create')->with(compact('enrolls','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnrollRequest $request)
    {
        //
        try{
            $data=$request->validated();
            $enroll = Enroll::create($data);
            return redirect(route('course.index'))->with('success', 'Enrolled successfully!');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Not found!');
        }
        catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $enrolls=Enroll::where('id',$id)->first();
        $courses=Course::all();
        return view('user.enrolls.edit')->with(compact('enrolls','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $enroll = Enroll::where('id', $id)->first();
            $enroll->delete();
            return redirect(route('admin.enrolls.list'))->with('success', 'Enrolls deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow(){
        $enrolls = Enroll::paginate(10);
        $courses = Course::all();
        return view('admin.enrolls.list', compact('enrolls','courses'));
    }
}
