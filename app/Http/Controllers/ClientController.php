<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Client::all();
        return view('clients.index')->with(compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create')->with('success','Clients created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //
        try{
            $data=$request->validated();
            if($request->hasFile('client_image')){
                $filenameI = 'client_image_' . uniqid() . '_' . time() . '.' . $request->file('client_image')->getClientOriginalExtension();
                $request->file('client_image')->move(public_path('assets'), $filenameI);
                $data['client_image'] = $filenameI;
            }
            $client = Client::create($data);

            return redirect(route('client.index'))->with('success', 'Client created successfully!');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Clients not found'],404);
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
        $clients=Client::where('id',$id)->first();
        return view('clients.edit')->with(compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        //
        try{
            $client = Client::findOrFail($id);
            $client->update($request->all());

            // Check if a new image is provided
            if ($request->hasFile('client_image')) {
                // Delete the existing image if it exists
                if ($client->client_image && file_exists(public_path('assets/' . $client->client_image))) {
                    unlink(public_path('assets/' . $client->client_image));
                }

                // Upload and save the new image
                $filename = 'client_image_'.uniqid().'_'.time() . '.' . $request->file('client_image')->getClientOriginalExtension();
                $request->file('client_image')->move(public_path('assets'), $filename);
                $client->update(['client_image' => $filename]);
            }
            return redirect(route('client.index'))->with('success', 'Client updated successfully');
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Clients not found'],404);
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
            $client=Client::where('id',$id)->first();
            $client->delete();
            return redirect(route('client.index'))->with('success','Client deleted successfully');
            }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Client not found'],404);
        }
        catch(Exception $e){
            return response()->json(['error'=>'Internal server error'],500);
        }
    }

    public function search()
{
    $clients = Client::all();
    return $clients;
}

}
