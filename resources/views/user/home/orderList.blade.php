@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello</div>
    <div class="mt-5 text-white">hello</div>
    <div class="mt-5 text-white">hello</div>
    <div class="container" style="height:1000px;">

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderList as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="width: 200px;"><img src="{{ asset('product_img/' . $item->image) }}" class="w-100"
                                style="height: 100px; width:100px;" alt=""></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end ">Total Amount ( {{ $total_amount->total_amount }} )</h4>

    </div>
@endsection
