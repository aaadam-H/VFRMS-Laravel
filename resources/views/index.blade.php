@extends('layouts.app')


@section('content')
    {{-- <h1>{{ $title }}</h1> --}}

    {{-- <ul>
        @forelse ($events as $event)
            <li>Event Name: {{ $event->eventName }}</li>
            <li>Event Status: {{ $event->status }}</li>
        @empty
            <li>No Available Events</li>
        @endforelse
    </ul> --}}

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

          <table border="0" class="d-flex justify-content-center">
            <?php $count = 0; ?>
            @forelse ($events as $event)
                @if ($count == 0)
                    <tr>
                @endif

                <td class='col-3'><img src='/storage/eventImg/{{ $event->eventImg }}' alt='' width='320' height='180' style='object-fit: contain; margin-inline:auto' class='d-flex justify-content-center mt-2'><br><a style='text-decoration:none; color:green' href='{{ route('event.show',$event->eventID) }}' class='d-flex justify-content-center text-justify'><span class="text-center text-break">{{ $event->eventName }}</span> </a></td>
                @if ($count == 2)
                        <?php $count = 0; ?>
                        </tr>
                @else
                        <?php $count++; ?>
                @endif
            @empty

            @endforelse
            {{-- while ($row = mysqli_fetch_assoc($result0)) {
              $eventName = $row['eventName'];
              $eventImg = $row['eventImg'];
              $fee = $row['fee'];
              $feeEarly = $row['earlyFee'];
              $regEndDateS = $row['registerEndDate'];
              $eventID = $row['eventID'];
              if ($i % 3 == 0) {
                echo "<tr>";
              }
            ?>

             --}}
          </table>
        </div>
      </div>
@endsection
