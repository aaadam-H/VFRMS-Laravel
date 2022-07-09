@extends('layouts.app')

@section('content')

    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        src="/storage/webAsset/{{ $user->profilePic }}" width="90"><span class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>{{ $user->accType }}</span></div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    <label for="uploadfile">Upload New Picture to change </label>
                    <input type="file" name="uploadfile" value="" />

                    <div class=" align-items-center text-center p-3 py-5">
                        <button type="submit" name="upload" class="btn btn-primary profile-button">UPLOAD</button>
                        <button type="submit"
                            onClick="javascript: return confirm('Are you sure?');"
                            name="delete" class="btn btn-danger profile-button"
                            title="DELETE CURRENT PROFILE PIC/RESET TO DEFAULT">DELETE</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2">
                            <div class="col-md-2"><label for="username">Username: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="Username"
                                    name="username" value="{{ $user->name }}"></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="password">Password: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control"
                                    placeholder="Re-enter current Password or New Password" name="password" required></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="contactNum">Contact Number: </label></div>
                            <div class="col-md-10"><input type="text" class="form-control" placeholder="Contact Number"
                                    value="{{ $user->contactNumber }}" name="contactNum"></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2"><label for="email">Email: </label></div>
                            <div class="col-md-10"><input type="email" class="form-control" placeholder="Email"
                                    value="{{ $user->email }}" name="email"></div>

                        </div>
                        <div class="mt-5 text-right"><button name='submit' class="btn btn-primary profile-button">Save
                                Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
