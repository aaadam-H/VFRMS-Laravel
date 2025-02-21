@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container rounded bg-white mt-5">
            <div class="row mt-2">
                @isset($message)
                    <div class="alert alert-success">
                        <strong>{{ $message }} </strong>
                    </div>
                @endisset

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <table class="d-flex justify-content-center m-2">
                    @if (Auth::user() && Auth::user()->events()->count() > 0)
                    <tr class="m-3">
                        <th class=""></th>
                        <th class="justify-content-center">Event Name</th>
                        <th class="justify-content-center">Start Date</th>
                        <th class="justify-content-center">End Date</th>
                        <th class="justify-content-center">Status</th>
                        <th class=""></th>
                        <th class=""></th>
                        <th class=" "></th>
                    </tr>

                    @else

                    @endif
                    @forelse ($events as $event)
                    <tr class="table-body-row" style="margin-bottom: 20px;">
                        <td class="m-2 p-2" style="text-align: center;">
                            <img src="{{ asset('storage/eventImg/'.$event->eventImg) }}" alt="Event image"
                                width="160" height="90" style="object-fit: contain;">
                        </td>
                        <td class="m-2 p-2">{{ $event->eventName }}</td>
                        <td class="m-2 p-2">{{ $event->eventStartDate }}</td>
                        <td class="m-2 p-2">{{ $event->eventEndDate }}</td>
                        <td class="m-2 p-2"><strong>{{ $event->status }}</strong> </td>
                        @if (Auth::user()->accType == 'user')
                        <td class="border-0"><button type="" class="btn btn-info"><a class="btn"
                                    href=""
                                    style='color: black; text-decoration:none;' title='Check Event Detail'>CHECK</a>
                                </button>
                        </td>

                        <td class="border-0">
                            <button type="" class="btn btn-danger">
                                <a class='btn'onClick="javascript: return confirm('Are you sure to deregister event ...');"
                                        href=""
                                        style='color: black; text-decoration:none;' title="DEREGISTER">
                                        DEREGISTER
                                </a>
                            </button>
                        </td>
                        <td class="border-0">
                            <button type="" class="btn btn-success">
                                <a class='btn' href=""
                                        style='color: black; text-decoration:none;' title="Manage Event Proof">
                                        PROOF
                                </a>
                            </button>
                        </td>
                        @else
                        <td class="border-0">
                            <button type="" class="btn btn-info">
                                <a class="btn" href=""
                                    style='color: black; text-decoration:none;'>
                                    View Participant
                                </a>
                            </button>
                        </td>
                        <td class="border-0">
                            <button type="" class="btn btn-warning">
                                <a class="btn" href=""
                                    style='color: black; text-decoration:none;'>
                                    Edit Event
                                </a>
                            </button>
                        </td>
                        <td class="border-0">
                            <button type="" class="btn btn-danger">
                                <a class="btn" onClick="javascript: return confirm('Are you sure to end event {{ $event->eventName }}');"
                                    href=""
                                    style='color: black; text-decoration:none;'>
                                    End Event
                                </a>
                            </button>
                        </td>
                        @endif
                    </tr>
                    <tr><td colspan="8" style="height: 20px;"></td></tr>
                    @empty
                    <tr>
                        <td colspan='7' class="text-center">0 results</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
