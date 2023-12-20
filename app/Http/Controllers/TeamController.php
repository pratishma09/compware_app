<?php

namespace App\Http\Controllers;
use App\Models\Team;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
        // Return a view called 'teams.index' and pass the 'teams' variable to the view
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
        return view('teams.create')->with('success','Teams created successfully');
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
        try{
            $data=$request->validated();

            if($request->hasFile('team_image')){
                $filenameI = time() . '.' . $request->file('team_image')->getClientOriginalExtension();
            $request->file('team_image')->move(public_path('assets'), $filenameI);
            $data['team_image'] = $filenameI;
            }
            if($request->hasFile('team_signature')){
                $filenameS = time() . '.' . $request->file('team_signature')->getClientOriginalExtension();
            $request->file('team_signature')->move(public_path('assets'), $filenameS);
            $data['team_signature'] = $filenameS;
            }
            $team = Team::create($data);

        return redirect(route('team.index'))->with('success', 'Team created successfully!');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Teams not found'],404);
        }
        catch(Exception $e){
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
        $team=Team::where('id',$id)->first();
        return view('teams.edit')->with(compact('teams'));
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
        try {
            $team = Team::findOrFail($id);
            $team->update($request->all());
    
            // Check if a new image is provided
            if ($request->hasFile('team_image')) {
                // Delete the existing image if it exists
                if ($team->team_image && file_exists(public_path('assets/' . $team->team_image))) {
                    unlink(public_path('assets/' . $team->blogs_image));
                }
    
                // Upload and save the new image
                $filenameI = time() . '.' . $request->file('team_image')->getClientOriginalExtension();
                $request->file('team_image')->move(public_path('assets'), $filenameI);
                $team->update(['team_image' => $filenameI]);
            }
            if($request->hasFile('team_signature')){
                if ($team->team_signature && file_exists(public_path('assets/' . $team->team_signature))) {
                    unlink(public_path('assets/' . $team->team_signature));
                }
                $filenameS = time() . '.' . $request->file('team_signature')->getClientOriginalExtension();
            $request->file('team_signature')->move(public_path('assets'), $filenameS);
            $team->update(['team_signature' => $filenameS]);
            }
    
            // Update other fields
            
            //dd($blog->blogs_image);
    
            return redirect(route('team.index'))->with('success', 'Team updated successfully');
        } catch (Exception $e) {
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
        $team=Team::where('id',$id)->first();
        $team->delete();
        return redirect(route('team.index'))->with('success','Team deleted successfully');
    }
}
