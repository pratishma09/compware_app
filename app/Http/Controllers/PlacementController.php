<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlacementRequest;
use App\Models\Placement;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $placements=Placement::all();
        return view('placements.index')->with(compact('placements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('placements.create')->with('success','Placements created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlacementRequest $request)
    {
        //
        try{
            $data=$request->validated();
            if($request->hasFile('placement_image')){
                $filenameI = 'placement_image_' . uniqid() . '_' . time() . '.' . $request->file('placement_image')->getClientOriginalExtension();
                $request->file('placement_image')->move(public_path('assets'), $filenameI);
                $data['placement_image'] = $filenameI;
            }
            $placement = Placement::create($data);

            return redirect(route('placement.index'))->with('success', 'Placement created successfully!');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Placements not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error','$e'],500);
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
        $placements=Placement::where('id',$id)->first();
        return view('placements.edit')->with(compact('placements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlacementRequest $request, $id)
    {
        //
        try{
            $placement = Placement::findOrFail($id);
            $placement->update($request->all());

            // Check if a new image is provided
            if ($request->hasFile('placement_image')) {
                // Delete the existing image if it exists
                if ($placement->placement_image && file_exists(public_path('assets/' . $placement->placement_image))) {
                    unlink(public_path('assets/' . $placement->placement_image));
                }

                // Upload and save the new image
                $filename = 'placement_image_'.uniqid().'_'.time() . '.' . $request->file('placement_image')->getClientOriginalExtension();
                $request->file('placement_image')->move(public_path('assets'), $filename);
                $placement->update(['placement_image' => $filename]);
            }
            return redirect(route('placement.index'))->with('success', 'Placement updated successfully');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Placament not found'],404);
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
            $placement=Placement::where('id',$id)->first();
            $placement->delete();
            return redirect(route('placement.index'))->with('success','Placement deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Placement not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
        }
    }
}
