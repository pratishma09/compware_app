<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        return view('teams.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.teams.create')->with('success','Teams created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        
        try{
            $data=$request->validated();

            if($request->hasFile('team_image')){
                $filenameI = 'team_image_' . uniqid() . '_' . time() . '.' . $request->file('team_image')->getClientOriginalExtension();
                $request->file('team_image')->move(public_path('assets'), $filenameI);
                $data['team_image'] = $filenameI;
            }
            if($request->hasFile('team_signature')){
                $filenameS = 'team_signature_' . uniqid() . '_' . time() . '.' . $request->file('team_signature')->getClientOriginalExtension();
                $request->file('team_signature')->move(public_path('assets'), $filenameS);
                $data['team_signature'] = $filenameS;
            }
            $team = Team::create($data);

            return redirect(route('admin.teams.list'))->with('success', 'Team created successfully!');
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
        $team=Team::where('id',$id)->first();
        return view('admin.teams.edit')->with(compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        //
        try {
            $team = Team::findOrFail($id);
            $team->update($request->all());
    
            // Check if a new image is provided
            if ($request->hasFile('team_image')) {
                // Delete the existing image if it exists
                if ($team->team_image && file_exists(public_path('assets/' . $team->team_image))) {
                    unlink(public_path('assets/' . $team->team_image));
                }
    
                // Upload and save the new image
                $filenameI = 'team_image_' . uniqid() . '_' . time() . '.' . $request->file('team_image')->getClientOriginalExtension();
                $request->file('team_image')->move(public_path('assets'), $filenameI);
                $team->update(['team_image' => $filenameI]);
            }
            if($request->hasFile('team_signature')){
                if ($team->team_signature && file_exists(public_path('assets/' . $team->team_signature))) {
                    unlink(public_path('assets/' . $team->team_signature));
                }
                $filenameS = 'team_signature_' . uniqid() . '_' . time() . '.' . $request->file('team_signature')->getClientOriginalExtension();
                $request->file('team_signature')->move(public_path('assets'), $filenameS);            
            $team->update(['team_signature' => $filenameS]);
            }
            // Update other fields
            return redirect(route('admin.teams.list'))->with('success', 'Team updated successfully');
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
        //
        try{
        $team=Team::where('id',$id)->first();
        $team->delete();
        return redirect(route('admin.teams.list'))->with('success','Team deleted successfully');
        }
        catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow()
    {
        $teams=Team::all();
        return view('admin.teams.list')->with(compact('teams'));
    }
}
