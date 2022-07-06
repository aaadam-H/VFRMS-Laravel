<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        $title = "HOME PAGE";
        $data = array(
            'title' => 'HOME PAGE',
            'events' => ['Larian 1', 'Larian 2', 'Larian 3'],
            'organizers' => ['Org1', 'Org2', 'Org3'],
        );

        //dd($events);
        return view('index')->with(['events'=>$events,'title'=>$title,$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->accType == 'organizer'){
            return 'Create Event Page';
        }

        return redirect()->route('event.index')->with('error','You cannot create an event. You not an Organizer');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $contact = $request->input('contactNumber');
        // $accType = $request->input('accType');
        // return "name ". $name . " email " . $email . " contact " . $contact . " acctype " . $accType;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::find($id);
        return view('eventPage.eventDetail')->with('event',$event);
        // return "event id: ".$id. " event name: " . $event->eventName;
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
    }

    public function myEvent(){
        return 'myEventPage';
    }

    public function test()
    {
        dd(Auth::user());
    }
}
