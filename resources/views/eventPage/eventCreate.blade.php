@extends('layouts.app')

@section('content')

    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded mt-5"
                        src="/storage/webAsset/edit-tools.png"></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <form action="{{ route('test.create') }}" method="GET"> {{-- enctype="multipart/form-data"> --}}
                        @csrf
                        {{ $errors }}
                        {{-- <div class="mb-3">
                            <label class="form-label" for="inputName">Name:</label>
                            <input
                                type="text"
                                name="name"
                                id="inputName"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name">

                            <!-- Way 2: Display Error Message -->
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
--}}
                        <div class="row mt-2">
                            <div class="col-md-2"><label for="eventNameIn">Event Name: </label></div>
                            {{-- <div class="col-md-10">
                                <input type="text" id='eventNameIn' class="form-control @error('eventName') is-invalid @enderror" name="eventName" value="{{ old('eventName') }}" placeholder="Event Name" required autofocus>

                                @error('eventName')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="col-md-6">
                                <input id="eventName" type="text" class="form-control @error('eventName') is-invalid @enderror" name="eventName" value="{{ old('eventName') }}"  autocomplete="eventName" autofocus placeholder="Username">

                                @error('eventName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                        {{-- <div class="row mt-3">
                        <div class="col-md-2"><label for="eventSDate">Event Start Date: </label></div>
                            <div class="col-md-10"><input type="date" class="form-control" value="" name="eventSDate" required></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventEDate">Event End Date: </label></div>
                            <div class="col-md-10"><input type="date" class="form-control" value="" name="eventEDate" required></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventRegSDate">Event Register Start Date: </label></div>
                            <div class="col-md-10"><input type="date" class="form-control" value="" name="eventRegSDate" required></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventRegEDate">Event Register End Date: </label></div>
                            <div class="col-md-10"><input type="date" class="form-control" value="" name="eventRegEDate" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="desc">Event Description: </label></div>
                            <div class="col-md-10">
                                {{ Form::textarea('Event Description', '', ['placeholder' => 'Event Description', 'class' => 'form-control', 'name' => 'desc']) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="fee">Fee: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="RM .." value="" name="fee" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="earlyFee">Early Bird Fee: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="RM ..(Same as Fee if none)" value="" name="earlyFee" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="earlyFeeQt">Early Bird Capacity: </label></div>
                            <div class="col-md-10"><input type="number" class="form-control" placeholder="50" value="" name="earlyFeeQt" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="accBankName">Bank Name: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="" value="" name="accBankName" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="accNumber">Account Number: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="" value="" name="accNumber" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="contactNumEvent">Contact Number: </label></div>
                            <div class="col-md-10"><input type="tel" class="form-control" placeholder="Phone Number" value="" name="contactNumEvent" required></div>
                        </div>

                        <div class="row mt-3 text-left">
                            <label for="uploadfile">Upload Picture for Event Icon <br></label>
                            <input type="file" name="eventImg" value="" class="ml-2" />
                        </div> --}}

                        <div class="mt-5 text-right"><button name='submit' class="btn btn-primary profile-button">Create</button></div>
                        {{-- {!! Form::close() !!} --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
