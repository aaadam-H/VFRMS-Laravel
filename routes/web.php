<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/*
TO-DO:
    [x]Register earlybirdfee
        - EBF qtt in event table
        - count by event_id in user_events table ~ earlybirdfee available if count < EBF qtt
        - if count > EBF qtt, show EBF not available
        - user_events table add column earlybirdfee=1 if user register earlybirdfee
    [x]Edit event (admin)
    [x]View participant (admin)
        - can see payment proof and run proof. Verify if true

    [x]Add proof (user)
    [x]add payment proof bfr register event
    [x]stats page for admin n user
*/
date_default_timezone_set('Asia/Kuala_Lumpur');

Auth::routes();
Route::get('/home', function () {
    return redirect('/');
});
Route::get('/', function () {
    return redirect('/event');
});

//event
Route::resource('/event', EventsController::class)->only('index');
Route::middleware('auth')->group(function () {
    Route::resource('/event', EventsController::class)->except('index');
    Route::post('/event/register', [EventsController::class, 'register'])->name('event.register');
    Route::post('myEvent/deregister',[EventsController::class, 'deregister'])->name('event.deregister');
    Route::get('/myEvent', [EventsController::class, 'myEvent'])->name('myEvent');
    Route::post('/myEvent', [EventsController::class, 'closeEvent'])->name('event.close');
});


//user
Route::middleware('auth')->group(function () {
    Route::resource('user', UsersController::class)->only('index', 'show', 'update', 'edit');
});
Route::prefix('user')->middleware('auth')->group( function(){
    Route::put('/{id}/updateImg', [UsersController::class, 'updateImg'])->name('user.updateImg');

});


//test
Route::get('/test', function () {
    // $user = Auth::user()->name;
    // $user = Auth()->user() ?? 'test';
    // $event = Events::find(1);
    // return "event name ".$event->eventName." own by ". $event->user->name." acctype: ". $event->user->accType;
    //dd($user);
    return view('test');
})->name('test');

Route::get('/test/create', [EventsController::class, 'storeTest0'])->name('test.create');
