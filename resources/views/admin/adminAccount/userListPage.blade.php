@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-1"></div>
            <div class="col-2">
            </div>
            <form action="{{ route('view#userListPage') }}" method="GET" class="col" >
                <div class=" d-flex justify-content-end">
                    <input type="text" class="form-control w-25" value="{{ request('searchKey') }}" placeholder="Search.." name="searchKey">
                    <button class="btn btn-primary shadow-sm rounded mx-1">Search</button>
                </div>
            </form>
            <div class="col-1"></div>
        </div>
        <div class="row">

            <div class="col-1"></div>
            <div class="col-10 card">

                <div class="card-title">
                    <a href="{{ route('view#adminListPage') }}" class="btn btn-primary btn-sm my-2">Back</a>
                    <div class="h3 d-flex justify-content-center text-dark">User Lists</div>
                </div>

                <table class="table table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created Date</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_data as $item)

                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone ? $item->phone : '....' }}</td>
                                <td>{{ $item->address ? $item->address : '....' }}</td>
                                <td class="text-danger">{{ $item->role }}</td>
                                <td>{{ $item->created_at->format('j-F-y') }}</td>
                                @if (Auth::user()->role == 'superadmin')
                                    <td><a href="{{ route('delete#adminAccount', $item->id) }}">Delete</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
