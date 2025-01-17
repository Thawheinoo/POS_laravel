@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-1"></div>
            <div class="col-2">
                <a href="{{ route('view#userListPage') }}" class="btn btn-primary">User Lists</a>
            </div>
            <form action="{{ route('view#adminListPage') }}" class="col">
                <div class=" d-flex justify-content-end">
                    <input type="text" class="form-control w-25" value="{{ request('searchKey') }}" placeholder="Search.."
                        name="searchKey">
                    <button class="btn btn-primary shadow-sm rounded mx-1">Search</button>
                </div>
            </form>
            <div class="col-1"></div>
        </div>
        <div class="row">

            <div class="col-1"></div>
            <div class="col-10 card">

                <div class="card-title">
                    <a href="{{ route('add#adminAccount') }}" class="btn btn-primary btn-sm my-2">Back</a>
                    <div class="h3 d-flex justify-content-center text-dark">Admin Lists</div>
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
                        @foreach ($admin_data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone ? $item->phone : '....' }}</td>
                                <td>{{ $item->address ? $item->address : '....' }}</td>
                                <td class="text-danger">{{ $item->role }}</td>
                                <td>{{ $item->created_at->format('j-F-y') }}</td>
                                @if ($item->role !== 'superadmin')
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
