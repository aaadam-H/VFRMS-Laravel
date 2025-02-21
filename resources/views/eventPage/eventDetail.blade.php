@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-primary " onclick="history.back()">Back</button>
    <div class="container rounded bg-white mt-2 pb-5">
        <form action="{{ route('event.register') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6" style="float: none; margin:auto;">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-3">
                        <img class="rounded mt-5" src="/storage/eventImg/{{ $event->eventImg }}" width="320">
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event Name: </strong></div>
                        <div class="col-md-8">{{ $event->eventName }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event Description: </strong></div>
                        <div class="col-md-8">{{ $event->eventDesc }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Status: </strong></div>
                        <div class="col-md-8">{{ $event->status }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event Register Start Date: </strong></div>
                        <div class="col-md-8">{{ $event->regStartDate }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event Register End Date: </strong></div>
                        <div class="col-md-8">{{ $event->regEndDate }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event Start Date: </strong></div>
                        <div class="col-md-8">{{ $event->eventStartDate }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Event End Date: </strong></div>
                        <div class="col-md-8">{{ $event->eventEndDate }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Organize By: </strong></div>
                        <div class="col-md-8">{{ $event->user->name }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Total Participant: </strong></div>
                        <div class="col-md-8"> total part</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Fee: </strong></div>
                        <div class="col-md-8">RM{{ $event->fee }}</div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4"><strong>Bank Name: </strong></div>
                        <div class="col-md-8">{{ $event->bankName }}</div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4"><strong>Account Number: </strong></div>
                        <div class="col-md-8">{{ $event->accNumber }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Contact Number: </strong></div>
                        <div class="col-md-8">{{ $event->contactNumEvent }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <input type="hidden" name="eventID" value="{{ $event->eventID }}">
                @auth
                    @if (Auth::user()->accType == 'organizer')
                        <button class="alert">ADMIN</button>
                    @else
                        <button name='submit' class="btn btn-success">Register</button>
                    @endif
                @endauth
            </div>
        </form>
    </div>
@endsection
