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
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
    Route::get('/myEvent', [EventsController::class, 'myEvent'])->name('myEvent');
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
