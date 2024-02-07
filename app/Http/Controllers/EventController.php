<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Event;
use App\Http\Requests\EventRequest;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        return view('events.index')->with(compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create')->with('success', 'Event created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        //
        try {
            $data = $request->validated();

            if ($request->hasFile('event_image')) {
                $filename = 'event_image_' . uniqid() . '_' .time() . '.' . $request->file('event_image')->getClientOriginalExtension();
                $request->file('event_image')->move(public_path('assets'), $filename);
                $data['event_image'] = $filename;
            }

            $event = Event::create($data);

            return redirect(route('event.index'))->with('success', 'Event created successfully!');
        } catch (Exception $e) {
            // Something went wrong
            return response()->json(['error' => 'Database error'], 500);
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
        $event = Event::where('id', $id)->first();
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        //
        try {

            $event = Event::findOrFail($id);
            $event->update($request->all());

            // Check if a new image is provided
            if ($request->hasFile('event_image')) {
                // Delete the existing image if it exists
                if ($event->blogs_image && file_exists(public_path('assets/' . $event->event_image))) {
                    unlink(public_path('assets/' . $event->event_image));
                }

                // Upload and save the new image
                $filename = 'event_image_' . uniqid() . '_' .time() . '.' . $request->file('event_image')->getClientOriginalExtension();
                $request->file('event_image')->move(public_path('assets'), $filename);
                $event->update(['event_image' => $filename]);
            }
            return redirect(route('event.index'))->with('success', 'Event updated successfully');
        }catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Event not found'], 404);
        } 
        catch (Exception $e) {
            return response()->json(['error' => 'Database error'], 500);
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
            $event=Event::where('id',$id)->first();
            $event->delete();
            return redirect(route('event.index'))->with('success','Event deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Event not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
        }
    }
}
