<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isOrg')->only('create','store');
    }
    public function index()
    {

        //ongoing events
        $events = Events::where('status', 'ongoing')->get();
        $eventsOff = Events::where('status', 'closed')->get();
        // dd($eventsOff);
        return view('index', compact('events', 'eventsOff'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventPage.eventCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'eventName' => ['required','string'],
            'eventSDate' => ['required','date'],
            'eventEDate' => ['required','date'],
            'desc' => ['required','string'],
            'eventRegSDate' => ['required','date'],
            'eventRegEDate' => ['required','date'],
            'fee' => ['required','numeric','min:0'],
            'earlyFee' => ['required','numeric'],
            'contactNumEvent' => ['required'],
            'accBankName' => ['required'],
            'accNumber' => ['required'],
            'earlyFeeQt' => ['required','numeric'],
            //'eventImg' => ['required','image'],
        ],[
            'eventName.required' => 'Event Name is required!',
            'eventSDate.required' => 'Event Start Date is required!',
            'eventEDate.required' => 'Event End Date is required!',
            'eventRegSDate.required' => 'Event Register Start Date is required!',
            'eventRegEDate.required' => 'Event Register End Date is required!',
            'fee.required' => 'Fee is required!',
            'earlyFee.required' => 'Early Fee is required!',
            'contactNumEvent.required' => 'Contact Number for Event is required!',
            'accBankName.required' => 'Bank Name is required!',
            'accNumber.required' => 'Bank Account Number is required!',
            'earlyFeeQt.required' => 'Early Fee Quota is required!',
            //'eventImg.required' => 'Event Image is required!',
        ]);

        if($request->hasFile('eventImg')){
            $fileNameWithExt = $request->file('eventImg')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('eventImg')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.$validatedData['eventName'].'_'. date("Y-m-d", time()).'.'.$ext;
            $path = $request->file('eventImg')->storeAs('public/eventImg', $fileNameToStore);
        } else {
            $fileNameToStore = 'noEventImg.png';
        }

        $event = new Events;
        $event->user_id = Auth::user()->id;
        $event->eventName = $validatedData['eventName'];
        $event->eventStartDate = $validatedData['eventSDate'];
        $event->eventEndDate = $validatedData['eventEDate'];
        $event->eventDesc = $validatedData['desc'];
        $event->status = 'ongoing';
        $event->regStartDate = $validatedData['eventRegSDate'];
        $event->regEndDate = $validatedData['eventRegEDate'];
        $event->fee = $validatedData['fee'];
        $event->earlyFee = $validatedData['earlyFee'];
        $event->contactNumEvent = $validatedData['contactNumEvent'];
        $event->bankName = $validatedData['accBankName'];
        $event->accNumber = $validatedData['accNumber'];
        $event->earlyFeeQt = $validatedData['earlyFeeQt'];
        $event->eventImg = $fileNameToStore;
        $event->save();

        return redirect('/event')->with('success','Event Created!');
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
        return view('eventPage.eventDetail', compact('event'));
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
        $user = Auth::user();
        if($user->accType == 'organizer'){
            $events = Events::where('user_id', $user->id)->get();
        } else {
            $events = DB::table('user_events')
                        ->join('events', 'user_events.event_id', '=', 'events.id')
                        ->where('user_events.user_id', $user->id)
                        ->select('events.*')
                        ->get();
        }
        return view('profile.myEvent', compact('events'));
    }

    public function register(Request $request)
    {
        $event = Events::find($request->input('eventID'));
        $user = Auth::user();
        //check if event is closed
        if($event->status != 'ongoing'){
            return redirect()->route('event.index')->with('error', 'Event is closed!');
        }
        //check if user already registered
        if($event->users->contains($user->id)){
            return redirect()->route('event.index')->with('error', 'You have already registered for the event!');
        }

        if ($event && $user) {
            DB::table('user_events')->insert([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('event.index')->with('success', 'You have successfully registered for the event!');
        }

        return redirect()->route('event.index')->with('error', 'Failed to register for the event.');
    }

    public function deregister(Request $request)
    {
        $event = Events::find($request->input('event_id'));
        $user = Auth::user();
        if ($event && $user && $event->users->contains($user->id)) {
            DB::table('user_events')->where('event_id', $event->id)->where('user_id', $user->id)->delete();
            return redirect()->route('myEvent')->with('success', 'You have successfully deregistered for the event!');
        }

        return redirect()->route('myEvent')->with('error', 'Failed to deregister for the event.');
    }
}
