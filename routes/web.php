<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('/event');
})->name('home');

Route::resource('/event', EventsController::class);

Route::get('/user/myEvent', [EventsController::class, 'myEvent'])->name('myEvent');

//Route::get('/', [EventsController::class, 'index']);
Route::get('/', function(){
    return redirect('/event');
});

Route::resource('/user', UsersController::class)->only('index','show','update','edit')->middleware('auth');

Route::get('/test', function(){
    // $user = Auth::user()->name;
    $user = Auth()->user()->accType ?? 'test';
    dd($user);
});


Route::prefix('user')->middleware('auth')->group( function(){

});



