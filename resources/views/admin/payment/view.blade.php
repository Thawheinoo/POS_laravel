@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 card">

                <div class="card-title">
                    <a href="{{ route('payment#page') }}" class="btn btn-primary btn-sm my-2">Back</a>
                    <div class="h3 d-flex justify-content-center text-dark">Your Payment Methods(Bank Accounts)</div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment_data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->account_number }}</td>
                                <td>{{ $item->account_name }}</td>
                                <td>{{ $item->type }}</td>
                                <td><a href="{{ route('payment#editshow', $item->id) }}">Edit</a></td>
                                <td><a href="{{ route('payment#delete', $item->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
