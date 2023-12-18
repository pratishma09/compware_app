<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index')->with(compact('blogs'));
    }

    public function create()
    {
        return view("blogs.create");
    }

    public function store(BlogRequest $request)
    {
        $filename = '';
        $data = $request->validated();
        $data['blogs_slug'] = Str::slug($data['blogs_slug']);

        try {

            if ($request->hasFile('blogs_image')) {
                $filename = time() . '.' . $request->blogs_image->getClientOriginalExtension();
                $request->blogs_image->move(public_path('assets'), $filename);
                $data['blogs_image'] = $filename;
            }

            $blog = Blog::create($data);
            return redirect(route('blog.index'))->with('success', 'Blog created successfully!');
            
        } catch (Exception $e) {
            // something went wrong

            return response()->json(['error' => 'Database error'], 500);
        }
    }
    public function edit($id)
    {
        //
        $blog = Blog::where('id', $id)->first();
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function show($slug)
{
    $blog = Blog::where('blogs_slug', $slug)->firstOrFail();
    $blogs = Blog::latest()->take(3)->get();

    try {
        return view('blogs.show', ['blog' => $blog, 'blogs'=> $blogs]);

    } catch (ModelNotFoundException $e) {
        
        return response()->json(['error' => 'Blog not found'], 404);

    } catch (Exception $e) {
        // Handle other exceptions
        return response()->json(['error' => 'Internal server error'], 500);
    }
}

    public function update(BlogRequest $request, $id)
    {
        try {
    
            $blog = Blog::findOrFail($id);
            $blog->update($request->all());
    
            // Check if a new image is provided
            if ($request->hasFile('blogs_image')) {
                // Delete the existing image if it exists
                if ($blog->blogs_image && file_exists(public_path('assets/' . $blog->blogs_image))) {
                    unlink(public_path('assets/' . $blog->blogs_image));
                }
    
                // Upload and save the new image
                $filename = time() . '.' . $request->file('blogs_image')->getClientOriginalExtension();
                $request->file('blogs_image')->move(public_path('assets'), $filename);
                $blog->update(['blogs_image' => $filename]);
            }
    
            // Update other fields
            
            //dd($blog->blogs_image);
    
            return redirect(route('blog.index'))->with('success', 'Blog updated successfully');
        } catch (Exception $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
    public function destroy($id)
    {
        //
        $blog = Blog::where('id', $id)->first();
        $blog->delete();
        return redirect(route('blog.index'))->with('success', 'Blog deleted successfully');
    }
}
