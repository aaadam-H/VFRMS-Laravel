@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-left">
            <table class="headerName">
                <tr>
                    <td class="pr-3 pl-3">
                        <h3 style="font-family: Georgia, serif;">REGISTER NOW!</h3>
                    </td>
                </tr>
            </table>
        </div>
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

            <table border="0" class="d-flex justify-content-center">
                <?php $count = 0; ?>
                @forelse ($events as $event)
                    @if ($count == 0)
                        <tr>
                    @endif

                    <td class='col-3'>
                <td class='col-3'><img src='/storage/eventImg/{{ $event->eventImg }}' alt='' width='320' height='180' style='object-fit: contain; margin-inline:auto' class='d-flex justify-content-center mt-2'><br><a style='text-decoration:none; color:green' href='{{ route('event.show',$event->id) }}' class='d-flex justify-content-center text-justify'><span class="text-center text-break">{{ $event->eventName }}</span> </a></td>
                @if ($count == 2)
                        <?php $count = 0; ?>
                        </tr>
                    @else
                        <?php $count++; ?>
                    @endif
                </td>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No event available</td>
                </tr>
            @endforelse
          </table>
        </div>
      </div>
@endsection
