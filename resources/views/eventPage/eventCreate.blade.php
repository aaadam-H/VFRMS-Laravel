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
                    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventName">Event Name: </label></div>
                            <div class="col-md-10">
                                <input id="eventName" type="text"
                                    class="form-control @error('eventName') is-invalid @enderror" name="eventName"
                                    value="{{ old('eventName') }}" autocomplete="eventName" autofocus
                                    placeholder="Event Name">
                                @error('eventName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventSDate">Event Start Date: </label></div>
                            <div class="col-md-10">
                                <input type="date"
                                class="form-control @error('eventSDate') is-invalid @enderror" value="{{ old('eventSDate') }}" name="eventSDate">
                                @error('eventSDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventEDate">Event End Date: </label></div>
                            <div class="col-md-10">
                                <input type="date" class="form-control @error('eventEDate') is-invalid @enderror" value="{{ old('eventEDate') }}" name="eventEDate">
                                @error('eventEDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventRegSDate">Event Register Start Date: </label></div>
                            <div class="col-md-10">
                                <input type="date" class="form-control @error('eventRegSDate') is-invalid @enderror" value="{{ old('eventRegSDate') }}" name="eventRegSDate">
                                @error('eventRegSDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="eventRegEDate">Event Register End Date: </label></div>
                            <div class="col-md-10"><input type="date" class="form-control @error('eventRegEDate') is-invalid @enderror" value="{{ old('eventRegEDate') }}"
                                    name="eventRegEDate">
                                @error('eventRegEDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="desc">Event Description: </label></div>
                            <div class="col-md-10">
                                <input type="textarea" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}" placeholder="Event Description">
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="fee">Fee: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control @error('fee') is-invalid @enderror" placeholder="RM .."
                                    value="{{ old('fee') }}" name="fee">
                                @error('fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="earlyFee">Early Bird Fee: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control  @error('earlyFee') is-invalid @enderror"
                                    placeholder="RM ..(Same as Fee if none)" value="{{ old('earlyFee') }}" name="earlyFee">
                                @error('earlyFee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="earlyFeeQt">Early Bird Capacity: </label></div>
                            <div class="col-md-10"><input type="number" class="form-control @error('earlyFeeQt') is-invalid @enderror" placeholder="50"
                                    value="{{ old('earlyFeeQt') }}" name="earlyFeeQt">
                                @error('earlyFeeQt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="accBankName">Bank Name: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control @error('accBankName') is-invalid @enderror" placeholder="Bank Name"
                                    value="{{ old('accBankName') }}" name="accBankName">
                                @error('accBankName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="accNumber">Account Number: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control @error('accNumber') is-invalid @enderror" placeholder="Bank Account Number"
                                    value="{{ old('accNumber') }}" name="accNumber">
                                @error('accNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="contactNumEvent">Contact Number: </label></div>
                            <div class="col-md-10"><input type="tel" class="form-control @error('contactNumEvent') is-invalid @enderror" placeholder="Phone Number"
                                    value="{{ old('contactNumEvent') }}" name="contactNumEvent">
                                @error('contactNumEvent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 text-left">
                            <label for="uploadfile">Upload Picture for Event Icon <br></label>
                            <input type="file" name="eventImg" class="ml-2" />
                        </div>

                        <div class="mt-5 text-right"><button name='submit'
                                class="btn btn-primary profile-button">Create</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
