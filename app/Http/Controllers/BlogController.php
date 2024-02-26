<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(1);
        return view('blogs.index')->with(compact('blogs'));
    }

    public function create()
    {
        $blogs = Blog::all();
        return view('admin.blogs.create')->with(compact('blogs'));
    }

    public function store(BlogRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('blogs_image')) {
                $filename = time() . '.' . $request->file('blogs_image')->getClientOriginalExtension();
                $request->file('blogs_image')->move(public_path('assets'), $filename);
                $data['blogs_image'] = $filename;
            }


            $blog = Blog::create($data);

            return redirect(route('admin.blogs.list'))->with('success', 'Blog created successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function edit($id)
    {
        //
        $blog = Blog::where('id', $id)->first();
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    public function show($slug)
    {
        $blog = Blog::where('blogs_slug', $slug)->firstOrFail();
        $blogs = Blog::latest()->take(3)->get();

        try {
            return view('blogs.show', ['blog' => $blog, 'blogs' => $blogs]);
        } catch (ModelNotFoundException $e) {

            return back()->with('error', 'Database error!');
        } catch (Exception $e) {
            // Handle other exceptions
            return back()->with('error', 'Something went wrong!');
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

            return redirect(route('admin.blogs.list'))->with('success', 'Blog updated successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function destroy($id)
    {
        //
        $blog = Blog::where('id', $id)->first();
        $blog->delete();
        return redirect(route('admin.blogs.list'))->with('success', 'Blog deleted successfully');
    }

    public function adminShow()
    {
        $blogs = Blog::all();
        return view('admin.blogs.list')->with(compact('blogs'));
    }
}
