@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Sale Information List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Order Code</th>
                    <th>Customer</th>
                    <th>Method Type</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale_info as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale['created_at'] }}</td>
                        <td>{{ $sale['order_code']}}</td>
                        <td>{{ $sale['user_name'] }}</td>
                        <td>{{ $sale['payment_method'] }}</td>
                        <td>{{ $sale['total_amount'] }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
