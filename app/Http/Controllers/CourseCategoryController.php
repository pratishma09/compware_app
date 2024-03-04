<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Coursecategory;
use App\Http\Requests\CourseCategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coursecategories=Coursecategory::all();
        return view('user.coursecategories.index')->with(compact('coursecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coursecategories.create')->with('success','Course Category created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCategoryRequest $request)
    {
        //
        try{
            
            $data=$request->validated();
            $coursecategory = Coursecategory::create($data);
            return redirect(route('admin.coursecategory.list'))->with('success', 'Course Category created successfully!');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Database error!');
        }
        catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
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
        $coursecategories=Coursecategory::where('id',$id)->first();
        return view('admin.coursecategories.edit')->with(compact('coursecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseCategoryRequest $request, $id)
    {
        //
        try{
            $coursecategory = Coursecategory::findOrFail($id);
            $coursecategory->update($request->all());
            return redirect(route('admin.coursecategory.list'))->with('success', 'Course category updated successfully');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Database error!');
        }
        catch(Exception $e){
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
        //
        try{
            $coursecategory=Coursecategory::where('id',$id)->first();
            $coursecategory->delete();
            return redirect(route('admin.coursecategory.list'))->with('success','Course category deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Database error!');
        }
        catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function adminShow()
    {
        //
        $coursecategories=Coursecategory::all();
        return view('admin.coursecategories.list')->with(compact('coursecategories'));
    }
}
