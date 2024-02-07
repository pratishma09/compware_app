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
        return view('coursecategories.index')->with(compact('coursecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coursecategories.create')->with('success','Course categories created successfully');
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
            return redirect(route('coursecategory.index'))->with('success', 'CourseCategory created successfully!');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'CourseCategories not found'],404);
        }
        catch(Exception $e){
            dd($e);
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
        $coursecategories=Coursecategory::where('id',$id)->first();
        return view('coursecategories.edit')->with(compact('coursecategories'));
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
            return redirect(route('coursecategory.index'))->with('success', 'Course category updated successfully');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Course Category not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
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
            return redirect(route('coursecategory.index'))->with('success','Course category deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Course Category not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
        }
    }
}
