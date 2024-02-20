<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Eventgallery;
use App\Models\Image;

use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventgalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $eventgalleries = Eventgallery::all();
            return view('eventgalleries.index', compact('eventgalleries'));
        } catch (Exception $e) {
            // Log or handle the exception as needed
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
        return view('admin.eventgalleries.create')->with('success', 'Eventgallery created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        try {
            $data = $request->validated();
            $eventgallery = Eventgallery::create([
                'gallery_name' => $data['gallery_name'],
            ]);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = 'image_' . uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets'), $filename);
                    Image::create([
                        'eventgallery_id' => $eventgallery->id,
                        'image' => $filename,
                    ]);
                }
            }
            return redirect(route('admin.eventgalleries.list'))->with('success', 'Eventgallery created successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Eventgallery not found'], 404);
        } catch (Exception $e) {
            // Something went wrong
            dd($e);
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function images($eventgallery_slug)
    {
        try {
            $eventgallery = Eventgallery::where('eventgallery_slug', $eventgallery_slug)->firstOrFail();
            $images = $eventgallery->images;
            return view('eventgalleries.images', compact('eventgallery', 'images'));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Eventgallery not found'], 404);
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
    public function edit($id)
    {
        try {
            $eventgallery = Eventgallery::findOrFail($id);
            return view('admin.eventgalleries.edit', compact('eventgallery'));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Eventgallery not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
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
        try {
            $eventgallery = Eventgallery::findOrFail($id);

            // Update existing fields
            $eventgallery->update([
                'gallery_name' => $request->input('gallery_name'),
                // Add other fields as needed
            ]);

            // Add new images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = 'image_' . uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets'), $filename);
                    Image::create([
                        'eventgallery_id' => $eventgallery->id,
                        'image' => $filename,
                    ]);
                }
            }

            return redirect(route('admin.eventgalleries.list'))->with('success', 'Eventgallery updated successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  int  $eventId
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($eventId, $imageId)
    {
        try {
            $eventgallery = Eventgallery::findOrFail($eventId);
            $image = Image::findOrFail($imageId);

            // Delete the image file from the public/assets directory
            $imagePath = public_path('assets') . '/' . $image->image;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Delete the Image record
            $image->delete();

            return redirect()->back()->with('success', 'Image deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
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
            $eventgallery = Eventgallery::findOrFail($id);

            // Delete all images associated with the eventgallery
            foreach ($eventgallery->images as $image) {
                $imagePath = public_path('assets') . '/' . $image->image;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $image->delete();
            }

            // Delete the Eventgallery
            $eventgallery->delete();

            return redirect(route('admin.eventgallery.list'))->with('success', 'Eventgallery deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function adminShow()
    {
        try {
            $eventgallery = Eventgallery::all();
            return view('admin.eventgalleries.list', compact('eventgallery'));
        } catch (Exception $e) {
            // Log or handle the exception as needed
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function showImages($id)
    {
        // Retrieve the event gallery by ID
        $gallery = EventGallery::findOrFail($id);

        // Return the view with the event gallery and its images
        return view('admin.eventgalleries.images_edit', compact('gallery'));
    }
}
