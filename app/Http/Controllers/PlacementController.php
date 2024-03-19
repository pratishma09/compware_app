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
        return $placements;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.placements.create')->with('success','Placements created successfully');
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

            return redirect(route('admin.placements.list'))->with('success', 'Placement created successfully!');
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
        $placements=Placement::where('id',$id)->first();
        return view('admin.placements.edit')->with(compact('placements'));
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

            if ($request->hasFile('placement_image')) {
                if ($placement->placement_image && file_exists(public_path('assets/' . $placement->placement_image))) {
                    unlink(public_path('assets/' . $placement->placement_image));
                }

                $filename = 'placement_image_'.uniqid().'_'.time() . '.' . $request->file('placement_image')->getClientOriginalExtension();
                $request->file('placement_image')->move(public_path('assets'), $filename);
                $placement->update(['placement_image' => $filename]);
            }
            return redirect(route('admin.placements.list'))->with('success', 'Placement updated successfully');
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
        try{
            $placement=Placement::where('id',$id)->first();
            $placement->delete();
            return redirect(route('admin.placements.list'))->with('success','Placement deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Not found!');
        }
        catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow(){
            $placements=Placement::paginate(10);
            return view('admin.placements.list')->with(compact('placements'));
    }
}
