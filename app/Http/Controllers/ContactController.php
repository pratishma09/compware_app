<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts=Contact::all();
        $courses =Course::all();
        return view('user.contacts.index')->with(compact('contacts', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contacts=Contact::all();
        $courses =Course::all();
        return view('user.contacts.create')->with(compact('contacts', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //
        try{
            $data=$request->validated();
            $contact = Contact::create($data);

            return redirect(route('user.contact.create'))->with('success', 'Contact made successfully!');
        }
        catch(ModelNotFoundException $e){
            return back()->with('error', 'Database error!');
        }
        catch(Exception $e){
            dd($e);
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
            $contact = Contact::where('id', $id)->first();
            $contact->delete();
            return redirect(route('admin.contacts.list'))->with('success', 'Contacts deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function adminShow()
    {
        //
        $contacts=Contact::all();
        $courses =Course::all();
        return view('admin.contacts.list')->with(compact('contacts', 'courses'));
    }
}
