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
        return view('enrolls.index', compact('enrolls','courses'));
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
        return view('enrolls.create')->with(compact('enrolls','courses'));
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
            return response()->json(['error'=>'Courses not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
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
        return view('enrolls.edit')->with(compact('enrolls','courses'));
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
    }
}
