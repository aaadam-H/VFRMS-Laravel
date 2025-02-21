<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('isOrg')->only('create','store');
    }
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
        return view('index')
            ->with(['events'=>$events,'title'=>$title,$data]);
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
            // 'email' => ['required','string','email'],
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
            // 'eventImg' => ['required','image'],
        ],[
            'eventName.required' => 'Event Name is required!',
            'email.required' => 'Email is required!',
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
        ]);

        // if($request->hasFile('eventImg')){
        //     $fileNameWithExt = $request->file('eventImg')->getClientOriginalName();
        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_BASENAME);
        //     $ext = $request->file('eventImg')->getClientOriginalExtension();
        //     $fileNameToStore = $fileName.'-'.time().'.'.$ext;
        //     $path = $request->file('eventImg')->storeAs('public/eventImg', $fileNameToStore);
        // }else{
        //     $fileNameToStore = 'noEventImg.png';
        //     return 123;
        // }

        $event = new Events;
        $event->user_id = Auth::user()->id;
        $event->eventName = $validatedData['eventName'];
        $event->eventStartDate = $request->input('eventSDate');
        $event->eventEndDate = $request->input('eventEDate');
        $event->eventDesc = $request->input('desc');
        $event->status = 'ongoing';
        $event->regStartDate = $request->input('eventRegSDate');
        $event->regEndDate = $request->input('eventRegEDate');
        $event->fee = $request->input('fee');
        $event->earlyFee = $request->input('earlyFee');
        $event->contactNumEvent = $request->input('contactNumEvent');
        $event->bankName = $request->input('accBankName');
        $event->accNumber = $request->input('accNumber');
        $event->earlyFeeQt = $request->input('earlyFeeQt');
        // $event->eventImg = $fileNameToStore;
        $event->save();

        return redirect('/event')->with('sucess','Event Created!');
    }

    public function storeTest0(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            // 'age' => 'required|numeric|min:1',
        ]);

        return redirect()->route('test')->with(['success' => 'Success created!','data' => $validatedData]);
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
        return view('profile.index');
    }

    public function test()
    {
        dd(Auth::user());
    }

    public function register(Request $req, $id)
    {
        $event = Events::find($id);
        $user = User::find(Auth::user()->id);
        $event->users()->attach($user);
        return redirect()->route('event.index')->with('success', 'You have successfully registered for the event!');
    }
}
