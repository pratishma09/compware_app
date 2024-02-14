<?php

namespace App\Http\Controllers;

use App\Models\Requestcertificate;
use App\Models\Course;
use App\Models\Team;
use App\Http\Requests\RequestCertificateRequest;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RequestCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requestcertificates = Requestcertificate::all();
        $courses = Course::all();
        $teams = Team::all();
        return view('requestcertificates.index')->with(compact('requestcertificates','courses','teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $requestcertificates = Requestcertificate::all();
        $courses = Course::all();
        $teams = Team::all();
        return view('requestcertificates.create')->with(compact('requestcertificates','courses','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCertificateRequest $request)
    {
        //
        try{
            
            $data=$request->validated();
            $requestcertificate = Requestcertificate::create($data);
            return redirect(route('requestcertificate.index'))->with('success', 'Requested successfully!');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Not found'],404);
        }
        catch(Exception $e){
            dd($e);
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
        $requestcertificates=Requestcertificate::where('id', $id)->first();
        $courses=Course::all();
        $teams=Team::all();
        return view('requestcertificates.edit')->with(compact('requestcertificates', 'courses','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCertificateRequest $request, $id)
    {
        //
        try{
            $requestcertificate = Requestcertificate::findOrFail($id);
            $requestcertificate->update($request->all());
            return redirect(route('requestcertificate.index'))->with('success', 'requestcertificate updated successfully');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'requestcertificates not found'],404);
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
        try {
            $requestcertificate = Requestcertificate::where('id', $id)->first();
            $requestcertificate->delete();
            return redirect(route('requestcertificate.index'))->with('success', 'requestcertificates deleted successfully');
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
