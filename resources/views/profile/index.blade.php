@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="/storage/webAsset/{{ $profilePic }}" width="90"><span class="font-weight-bold">{{ $name }}</span><span class="text-black-50">{{ $email }}</span><span>{{ $accType }}</span></div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-right"><a href="{{ route('user.edit', $id) }}" class="btn alert-info icon-edit">Edit Profile</a></h6>
                            </div>
                            <form action="" method="POST">
                                <div class="row mt-2">
                                    <div class="col-md-2"><label for="username">Username: </label></div>
                                    <div class="col-md-10"><input type="text" class="form-control" placeholder="Username" name="username" value="{{ $name }}" disabled></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2"><label for="password">Password: </label></div>
                                    <div class="col-md-10"><input type="text" class="form-control" placeholder="Password" value="******" disabled></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2"><label for="contactNum">Contact Number: </label></div>
                                    <div class="col-md-10"><input type="text" class="form-control" placeholder="Contact Number" value="{{ $contactNumber }}" disabled></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2"><label for="email">Email: </label></div>
                                    <div class="col-md-10"><input type="email" class="form-control" placeholder="Email" value="{{ $email }}" disabled></div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
@endsection
