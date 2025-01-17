@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello</div>
    <div class="mt-3 text-white">hello</div>
    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table " id="productTable">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" value="{{ Auth::user()->id }}" id="user_id">
                        @foreach ($cart_data as $item)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('product_img/' . $item->product_image) }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>

                                <td>
                                    <p class="mb-0 mt-4">{{ $item->product_name }}</p>
                                    <input type="hidden" class="product_id" value="{{ $item->product_id }}">

                                </td>
                                <td>
                                    <p class="mb-0 mt-4 price">{{ $item->product_price }} mmk</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border btn_minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input name="qty" type="text"
                                            class="form-control form-control-sm text-center border-0 qty input"
                                            value="{{ $item->qty }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border btn_plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4 total">{{ $item->product_price * $item->qty }} mmk</p>
                                </td>
                                <td>
                                    <form action="{{ route('product#cartdelete', $item->cart_id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>

                                <p class="mb-0" id="subTotal">{{ $total }} mmk</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Delivery</h5>
                                <div class="">
                                    <p class="mb-0">5000 mmk</p>
                                </div>
                            </div>

                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4" id="finalTotal">{{ $total + 5000 }} mmk </p>
                        </div>
                        <button {{ count($cart_data) == 0 ? 'disabled' : '' }} id="btn-checkout"
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection

@section('jq')
    <script>
        $(document).ready(function() {

            //user plus or minus button in cart page
            $('.btn_plus').click(function() {
                $parentNode = $(this).parents('tr');
                $price = $parentNode.find('.price').text().replace('mmk', '');
                $qty = $parentNode.find('.qty').val();
                $total = $price * $qty;

                $parentNode.find('.total').text($total + ' mmk');

                finalTotal();
 
            })

            $('.btn_minus').click(function() {
                $parentNode = $(this).parents('tr');
                $price = $parentNode.find('.price').text().replace('mmk', '');
                $qty = $parentNode.find('.qty').val();
                $total = $price * $qty;

                $parentNode.find(".total").text($total + ' mmk');

                finalTotal();
            })

            //total amount without loading in cart page
            function finalTotal() {
                $total = 0;

                $('#productTable tbody tr').each(function(index, item) {
                    $total += $(item).find('.total').text().replace('mmk', '') * 1;
                })

                $('#subTotal').text(`${$total} mmk`);

                $('#finalTotal').text(`${$total + 5000} mmk`);
            }

            //click proceed checkout button
            $('#btn-checkout').click(function() {
                $orderList = [];

                $userId = $('#user_id').val();
                $orderCode = 'POS-' + Math.floor(Math.random() * 10000000);
                $total_amount = $('#finalTotal').text().replace('mmk', '');

                $('#productTable tbody tr').each(function(index, item) {
                    $productId = $(item).find('.product_id').val();
                    $qty = $(item).find('.qty').val();

                    $orderList.push({
                        'user_id': $userId,
                        'product_id': $productId,
                        'qty': $qty,
                        'order_code': $orderCode,
                        'total_amount' : $total_amount,
                    });
                });



                $.ajax({
                    type: 'get',
                    url: '/user/product/cart/temp',
                    data: Object.assign({}, $orderList),
                    dataType: 'json',
                    success: function(response) {
                        response.status == 'ok' ? location.href = 'payment/page' :
                            '';
                    }
                })


            })

        })
    </script>
@endsection
