<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::all();  //Blog from model
        return view('blogs.index',['blogs'=>$blogs]);
    }

    public function create(){
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'blogs_name'=>['required','string','unique:blogs,blogs_name'],
            'blogs_desc'=>'required',
            'blogs_author'=>'required',
            'blogs_image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $filename='';

    if($request->hasFile('blogs_image')){
        $filename=time() . '.' . $request->blogs_image->getClientOriginalExtension(); 
        $request->blogs_image->move(public_path('assets'), $filename);
    }
        $blog=new Blog;
        $blog->blogs_name = $request->blogs_name;
        $blog->blogs_author = $request->blogs_author;
        $blog->blogs_desc = $request->blogs_desc;
        $blog->blogs_image = $filename;
        $blog->save();
        dd($blog);
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog=Blog::where('id',$id)->first();
        return view('blogs.edit',['blog'=>$blog]);
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
        $request->validate([
            'blogs_name'=>['required','string'],
            'blogs_desc'=>'required',
            'blogs_author'=>'required',
            'blogs_image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $blog=Blog::where('id',$id)->first();
    if(file_exists($request->blogs_image)){
        $filename=time() . '.' . $request->blogs_image->getClientOriginalExtension(); 
        $request->blogs_image->move(public_path('assets'), $filename);
        $blog->blogs_image = $filename;
    }
        $blog->blogs_name = $request->blogs_name;
        $blog->blogs_author = $request->blogs_author;
        $blog->blogs_desc = $request->blogs_desc;
        $blog->save();
        return redirect(route('blog.index'))->with('success','Blog updated successfully');
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
        $blog=Blog::where('id',$id)->first();
        $blog->delete();
        return redirect(route('blog.index'))->with('success','Blog deleted successfully');
    }
}
