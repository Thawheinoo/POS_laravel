@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello world</div>

    <div class="mt-5 text-white">hello world</div>

    <div class="container mt-5" style="height:1000px;">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h5>Transfer Account</h5>
                        <hr>
                        @foreach ($payment as $item)
                            <div>
                                <h5>{{ $item->type }} (Name : {{ $item->account_name }} )</h5>
                                <h5>Account: {{ $item->account_number }}</h5>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-1"></div>
                    <div class="col-7">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5>Pay Slip info</h5>
                            </div>
                            <form action="{{ route('product#paymentSlip') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body ">
                                    <div class="row mb-3">
                                        <input type="text" name="user_name" readonly
                                            class="form-control col me-4 @error('user_name') is-invalid @enderror"
                                            placeholder="Name.." value="{{ Auth::user()->name ? Auth::user()->name : Auth::user()->nickname }}">
                                        <input type="text" name="phone"
                                            class="form-control col @error('phone') is-invalid @enderror"
                                            placeholder="09xxxxxxx" value="{{ old('phone') }}">
                                    </div>
                                    <div class="row my-3">
                                        <input type="text" name="address"
                                            class="form-control col me-2 @error('address') is-invalid @enderror"
                                            placeholder="Address.." value="{{ old('address') }}">

                                        <input type="file" name="payslip_image"
                                            class="form-control me-2 col @error('payslip_image') is-invalid @enderror">

                                        <select name="payment_method" id="" name="payment_method"
                                            class= "form-select col @error('payment_method') is-invalid @enderror">
                                            <option value="">Select Your Payment Type</option>
                                            @foreach ($payment as $item)
                                                <option value="{{ $item->type }}"
                                                    @if (old('payment_method') == $item->id) selected @endif>{{ $item->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row my-3">
                                        <input type="hidden" name="order_code" value="{{ $orderList[0]['order_code'] }}">
                                        <h5 class=" col me-2 fw-bold text-secondary">Order
                                            Code:{{ $orderList[0]['order_code'] }} </h5>
                                        <input type="hidden" name="total_amount"
                                            value="{{ $orderList[0]['total_amount'] }}">
                                        <h5 class=" col text-secondary fw-bold ">Total Amount:
                                            {{ $orderList[0]['total_amount'] }} mmk</h5>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary p-auto m-auto">
                                            Order Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
