@extends('user.layouts.master')

@section('content')
    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <div class="mt-5 text-white">hello world</div>

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row mb-2 ">
                    <div class="col-lg-2 text-start">
                        <form action="{{ route('userHome') }}" method="get" class="">
                            @csrf
                            <div class="d-flex m-2">
                                <input type="text" class="form-control border-1 border-secondary rounded-pill"
                                    placeholder="Search" name="searchKey" value="{{ request('searchKey') }}">

                                <button class="btn btn-outline-warning rounded-pill py-2 m-1 text-muted">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>


                            <div class="d-flex justify-content-between m-2">
                                <input type="text" class="form-control border-1 border-secondary rounded-pill me-1"
                                    placeholder="min price" name="min_price" value="{{ request()->min_price }}">

                                <input type="text" class="form-control border-1 border-secondary rounded-pill"
                                    placeholder="max price" name="max_price" value="{{ request()->max_price }}">
                            </div>


                        </form>
                    </div>
                    <div class="col-2">
                        <form action="{{ route('userHome') }}" method="GET">
                            @csrf
                            <select name="sorting" id=""
                                class="form-select rounded-pill m-2 text-muted border-secondary bg-transparent">
                                <option value="price,asc" @selected(request('sorting') == 'price,asc')> Price Low-High</option>
                                <option value="price,desc" @selected(request('sorting') == 'price,desc')> Price High-Low</option>
                                <option value="name,asc" @selected(request('sorting') == 'name,asc')>A-z</option>
                                <option value="name,desc" @selected(request('sorting') == 'name,desc')>Z-a</option>
                                <option value="created_at,desc" @selected(request('sorting') == 'created_at,asc')>New-old</option>
                                <option value="created_at,asc" @selected(request('sorting') == 'created_at,desc')>Old-new</option>
                            </select>
                            <button class="btn btn-outline-warning rounded-pill m-2 text-muted w-100">
                                Sorting...
                            </button>
                        </form>
                    </div>
                    <div class="col-1 "></div>
                    <div class="col-lg-7">
                        <ul class="nav nav-pills d-inline-flex text-center">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 rounded-pill btn btn-outline-warning @if (!request('category_id')) active @endif"
                                    href="{{ url('user/home') }}">
                                    <span class="text-muted">All Products</span>
                                </a>
                            </li>

                            @foreach ($category as $item)
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 rounded-pill btn btn-outline-warning @if (request('category_id') == $item->id) active @endif"
                                        href="{{ url('user/home?category_id=' . $item->id) }}">
                                        <span class="text-muted">{{ $item->name }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-end">{{ $product->links() }}</div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach ($product as $item)
                                        <div class="col-md-6 col-lg-4 col-xl-3 ">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <a href="{{ route('product#detailsPage', $item->id) }}">
                                                        <img src="{{ asset('product_img/' . $item->image) }}"
                                                            class="img-fluid w-100 rounded-top" alt=""
                                                            style="height: 300px;">
                                                    </a>
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">{{ $item->category_name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $item->name }}</h4>
                                                    <p>{{ Str::words($item->description, 10, '...') }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $item->price }} mmk</p>
                                                        <a href="{{ route('product#detailsPage', $item->id) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

@endsection
