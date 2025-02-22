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
                        {{-- show no header if no events --}}
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
                        @if (Auth::user()->accType == 'user') {{-- user button --}}
                        <td class="">
                            <form action="{{ route('event.show', $event->id) }}" method="') }}">
                                <button type="submit" class="btn btn-info text-black">
                                    CHECK
                                </button>
                            </form>
                        </td>

                        <td class="">
                            <form action="{{ route('event.deregister', $event->id) }}" method="POST" onclick="return confirm('Are you sure to deregister {{ $event->eventName }}?')">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-danger text-black" title="DEREGISTER">
                                    DEREGISTER
                                </button>
                            </form>
                        </td>
                        <td class="">
                            <form action="">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="" class="btn btn-success" title="Manage Event Proof">
                                    PROOF
                                </button>
                            </form>
                        </td>
                        @else {{-- organizer button --}}
                        <td class="">
                            <button type="" class="btn btn-info">
                                <a class="btn" href=""
                                    style='color: black; text-decoration:none;'>
                                    View Participant
                                </a>
                            </button>
                        </td>
                        <td class="">
                            <button type="" class="btn btn-warning">
                                <a class="btn" href=""
                                    style='color: black; text-decoration:none;'>
                                    Edit Event
                                </a>
                            </button>
                        </td>
                        <td class="">
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
