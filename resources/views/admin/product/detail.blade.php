@extends('admin.layouts.master')

@section('content')
    {{-- Begin Page Content --}}
    <div class="container-fluid">
        <!--DataTables Example-->
        <div class="card shadow mb-4 col">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <a href="{{ route('product#listpage') }}" class="btn btn-primary btn-sm my-2">Back</a>
                    </div>
                </div>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="row  offset-1">
                        <div class="col-3">
                            {{-- {{ dd($product_detail->toArray()) }} --}}
                            <img src="{{ asset('product_img/' . $product_detail->image) }}" alt=""
                                class="img-profile img-thumbnail" id="output">
                        </div>
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Product Name:
                                </div>
                                <div class="col h5">{{ $product_detail->name }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Product Category:
                                </div>
                                <div class="col h5">{{ $product_detail->category_name }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Price:
                                </div>
                                <div class="col h5">{{ $product_detail->price }}</div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Stock left:
                                </div>
                                <div class="col h5">{{ $product_detail->stock }}@if ($product_detail->stock <= 3)
                                        <span class='text-danger'>(low amount stock)</span>
                                    @endif </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Created Date:
                                </div>
                                <div class="col h5">{{ $product_detail->created_at->format('j-F-Y') }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 h5">
                                    Description:
                                </div>
                                <div class="col h5">{{ $product_detail->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
