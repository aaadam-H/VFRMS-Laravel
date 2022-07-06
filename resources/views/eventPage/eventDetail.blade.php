@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5 pb-5">

        <div class="row">
            <div class="col-lg-6" style="float: none; margin:auto;">
                <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img class="rounded mt-5"
                        src="#" width="320"></div>
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
                    <div class="col-md-8">Organizer ID: {{ $event->user_id }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4"><strong>Total Participant: </strong></div>
                    <div class="col-md-8"> total part</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4"><strong>Fee: </strong></div>
                    <div class="col-md-8">RM{{ $event->fee }}</div>
                </div>

               {{-- earlyBird fee --}}


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

        {{-- button div --}}

    </div>
@endsection
