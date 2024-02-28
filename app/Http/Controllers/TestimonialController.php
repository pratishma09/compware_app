<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Course;
use App\Http\Requests\TestimonialRequest;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Exception;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonials=Testimonial::all();
        return $testimonials;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonials.create')->with('success','Created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        //
      
        try{
            $data=$request->validated();
            if($request->hasFile('testimonial_image')){
                $filenameI = 'testimonial_image_' . uniqid() . '_' . time() . '.' . $request->file('testimonial_image')->getClientOriginalExtension();
                $request->file('testimonial_image')->move(public_path('assets'), $filenameI);
                $data['testimonial_image'] = $filenameI;
            }
            $testimonial = Testimonial::create($data);

            return redirect(route('admin.testimonials.list'))->with('success', 'Testimonial created successfully!');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Not found!');
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
        $testimonials=Testimonial::where('id', $id)->first();
        $courses=Course::all();
        return view('admin.testimonials.edit')->with(compact('testimonials', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        //
        try{
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($request->all());

            if ($request->hasFile('testimonial_image')) {
                
                if ($testimonial->testimonial_image && file_exists(public_path('assets/' . $testimonial->testimonial_image))) {
                    unlink(public_path('assets/' . $testimonial->testimonial_image));
                }

                $filename = 'testimonial_image_'.uniqid().'_'.time() . '.' . $request->file('testimonial_image')->getClientOriginalExtension();
                $request->file('testimonial_image')->move(public_path('assets'), $filename);
                $testimonial->update(['testimonial_image' => $filename]);
            }
            return redirect(route('admin.testimonials.list'))->with('success', 'Testimonial updated successfully');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Not found!');
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
        try {
            $testimonial = Testimonial::where('id', $id)->first();
            $testimonial->delete();
            return back()->with('success', 'Testimonials deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow(){
        $testimonials=Testimonial::all();
        return view('admin.testimonials.list')->with(compact('testimonials'));
    }
}
