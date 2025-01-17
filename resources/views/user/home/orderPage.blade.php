@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello</div>
    <div class="mt-5 text-white">hello</div>
    <div class="mt-5 text-white">hello</div>

    <div class="container" style="height:1000px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Order Code</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->created_at->format('j-F-Y') }}</td>
                        <td>{{ $item->order_code }}</td>
                        <td>
                            @if ($item->status == 0)
                                <span class="btn btn-warning">Pending</span>
                            @elseif($item->status == 1)
                                <span class="btn btn-success">Accepted</span>
                                <p class="text-danger"> * Your order will be delivered within 3 days *</p>
                            @else
                                <span class="btn btn-danger">Unsuccessful</span>
                            @endif
                        </td>
                        <td><a class="btn btn-primary mt-2 text-white"
                                href="{{ route('product#viewOrderLists', $item->order_code) }}">View order List</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
