@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="{{ route('order#listPage') }}" class="btn btn-primary btn-sm rounded shadow-sm mx-5">Back</a>
        <h1 class="h3 mb-0 text-gray-800">Order-Code ({{ $order_code }})</h1>
    </div>
    <hr>

    <div class="container">

        <div class="cotanier">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col-5 h5">Name:</div>
                                <div class="col h5">{{ $paymentHistory->user_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 h5">Phone:</div>
                                <div class="col h5">{{ $paymentHistory->phone }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 h5">Address:</div>
                                <div class="col h5">{{ $paymentHistory->address }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 h5">Pay Method :</div>
                                <div class="col h5">{{ $paymentHistory->payment_method }}</div>
                            </div>
                            <div class="row ">
                                <div class="col-5 h5">Total Amount : </div>
                                <div class="col h5">{{ $paymentHistory->total_amount }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5"></div>
                                <div class="col"> <small class="text-danger">* Including Delivery Charges *</small></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-5 h5">Pay Slip Image:</div>
                                <div class="col"><img src="{{ asset('payslip_img/' . $paymentHistory->payslip_image) }}"
                                        alt="" style="width: 200px; height:200px;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-hover text-dark" id="productTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Available Stock</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total/product</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderProduct as $item)
                        <tr>
                            <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ asset('product_img/' . $item->product_image) }}" alt="Product Image"
                                    width="50"></td>
                            <td>{{ $item->product_name }}</td>
                            <td>
                                {{ $item->product_stock }}
                                {!! $item->product_stock < $item->order_qty ? '<span class ="text-danger"> ( Out Of Stock )  </spam>' : '' !!}
                            </td>
                            <td class="product_count">{{ $item->order_qty }} </td>
                            <td>{{ $item->product_price }} mmk</td>
                            <td>{{ $item->order_qty * $item->product_price }} mmk </td>
                            <td>{{ $item->created_at->format('j-F-Y') }}</td>
                        </tr>
                    @endforeach

                    <input type="hidden" id="order_code" value="{{ $order_code }}">

                </tbody>
            </table>
            <div class="card-footer d-flex justify-content-end">
                <div>
                    <button id="confirm-order" class="btn btn-primary"{{ !$check ? 'disabled' : '' }}>Confirm</button>
                    <button id="reject-order" class="btn btn-danger mx-3">Reject</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('confirm-order')
    <script>
        $(document).ready(function() {

            $('#reject-order').click(function() {
                $order_code = $('#order_code').val();

                $data = {
                    'order_code': $order_code,
                }

                $.ajax({
                    type : 'get' ,
                    url : '{{ route('order#reject') }}',
                    dataType: 'json',
                    data: $data,
                    success: function(res) {
                        res.status == 'ok' ? location.href = '{{ route('order#listPage') }}' :
                            '';
                    }
                })
            })




            $('#confirm-order').click(function() {

                $orderList = [];
                $order_code = $('#order_code').val();

                $('#productTable tbody tr').each(function(index, row) {

                    $product_id = $(row).find('.product_id').val();

                    $product_count = $(row).find('.product_count').text();

                    $orderList.push({
                        'product_id': $product_id,
                        'product_count': $product_count,
                        'order_code': $order_code,
                    })
                })

                $.ajax({
                    type: 'get',
                    url: '{{ route('order#confirm') }}',
                    dataType: 'json',
                    data: Object.assign({}, $orderList),
                    success: function(res) {
                        res.status == 'ok' ? location.href = '{{ route('order#listPage') }}' :
                            '';
                    }
                })

            })

        })
    </script>
@endsection
