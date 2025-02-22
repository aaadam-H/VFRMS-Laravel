@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 py-5">
                    <h2>All Users</h2>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><a href="{{ route('superAdmin.showAllUser', ['sort_by' => 'id', 'sort_order' => $sort_by == 'id' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">ID</a></th>
                                <th><a href="{{ route('superAdmin.showAllUser', ['sort_by' => 'name', 'sort_order' => $sort_by == 'name' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                                <th><a href="{{ route('superAdmin.showAllUser', ['sort_by' => 'email', 'sort_order' => $sort_by == 'email' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">Email</a></th>
                                <th><a href="{{ route('superAdmin.showAllUser', ['sort_by' => 'accType', 'sort_order' => $sort_by == 'accType' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">Account Type</a></th>
                                <th><a href="{{ route('superAdmin.showAllUser', ['sort_by' => 'contactNumber', 'sort_order' => $sort_by == 'contactNumber' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">Contact Number</a></th>
                                <th>Profile Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->accType }}</td>
                                    <td>{{ $user->contactNumber }}</td>
                                    <td>
                                        <img src="/storage/userProfilePic/{{ $user->profilePic }}" width="50" height="50" class="rounded-circle">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $users->appends(['sort_by' => $sort_by, 'sort_order' => $sort_order])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
