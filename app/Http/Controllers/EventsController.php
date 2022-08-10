<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            return view('eventPage.eventCreate');
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
        $this->validate($request, [
            //buat form request
            'eventName' => 'required|string',
            // 'email' => 'required|string|email',
            // 'eventSDate' => ['required','date'],
            // 'eventEDate' => ['required','date'],
            // 'desc' => ['required','string'],
            // 'eventRegSDate' => ['required','date'],
            // 'eventRegEDate' => ['required','date'],
            // 'fee' => ['required','numeric','|min:0'],
            // 'earlyFee' => ['required','numeric'],
            // 'contactNumEvent' => ['required','string'],
            // 'accBankName' => ['required','string'],
            // 'accNumber' => ['required','string'],
            // 'earlyFeeQt' => ['required','numeric'],
            // 'eventImg' => ['required','image'],
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
        $event->eventName = $request->input('eventName');
        // $event->eventStartDate = $request->input('eventSDate');
        // $event->eventEndDate = $request->input('eventEDate');
        // $event->eventDesc = $request->input('desc');
        // $event->status = 'ongoing';
        // $event->regStartDate = $request->input('eventRegSDate');
        // $event->regEndDate = $request->input('eventRegEDate');
        // $event->fee = $request->input('fee');
        // $event->earlyFee = $request->input('earlyFee');
        // $event->contactNumEvent = $request->input('contactNumEvent');
        // $event->bankName = $request->input('accBankName');
        // $event->accNumber = $request->input('accNumber');
        // $event->earlyFeeQt = $request->input('earlyFeeQt');
        // $event->eventImg = $fileNameToStore;
        $event->save();

        return redirect('/event')->with('sucess','Event Created!');
    }

    public function storeTest0(Request $req)
    {
        $validatedData = $req->validate([
            'eventName' => 'required|string',
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
