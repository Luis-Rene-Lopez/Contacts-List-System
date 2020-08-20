<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new Contacts;

        $db->firstName = $request->firstName;
        $db->lastName = $request->lastName;
        $db->email = $request->email;
        $db->contactNumber = $request->contactNumber;

        $db->save();

        Mail::raw('We added you in our contact list. Thank you.', function($message){
           $message->to( request('email') );
        });

        return back()->with('message', 'New Contact added!');

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
        $db = Contacts::findOrFail($id);

        $db->firstName = $request->firstName;
        $db->lastName = $request->lastName;
        $db->email = $request->email;
        $db->contactNumber = $request->contactNumber; 
        $db->save();

        return back()->with('message', 'contact updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = Contacts::findOrFail($id);
        $db->delete();
        return back()->with('message', 'contact deleted !');
    }
}
