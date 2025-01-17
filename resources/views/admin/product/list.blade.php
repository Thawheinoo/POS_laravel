@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col card">

                <div class="card-title">
                    <div class="h3 mt-2 d-flex justify-content-center text-dark">Product Lists</div>
                    <div class="btn btn-info position-relative">
                        <a href="{{ route('product#listpage') }}" class="text-decoration-none text-white">
                            <i class="fa-solid fa-database"></i> All Products
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary{{ request('lowamt') ? 'd-none' : '' }}">
                                {{ request('lowamt') ? '' : count($productList) }}
                            </span>
                        </a>
                    </div>
                    <div class="btn btn-danger mx-2 position-relative">
                        <a href="{{ route('product#listpage', 'lowamt') }}" class="text-decoration-none text-white">
                            <i class="fa-solid fa-database"></i> Low Amount Products
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary{{ request('lowamt') ? '' : 'd-none' }}">
                                {{ request('lowamt') ? count($productList) : '' }}
                            </span>
                        </a>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <form action="{{ route('product#listpage') }}" method="GET">
                            <input type="text" placeholder="Search..." class="form-control" name="searchKey"
                                value="{{ request('searchKey') }}">
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category_name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($productList) !== 0)
                                @foreach ($productList as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('product_img/' . $item->image) }}" class="w-100"
                                                style="height: 100px;" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="col-2">
                                            <button type="button" class="btn btn-info position-relative">
                                                {{ $item->stock }}
                                                @if ($item->stock <= 3)
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        low amount stock
                                                    </span>
                                                @endif
                                            </button>
                                        </td>
                                        <td>{{ $item->created_at->format('j-F-y') }}</td>
                                        <td><a href="{{ route('product#detail', $item->id) }}">Detail</a></td>
                                        <td><a href="{{ route('product#editpage', $item->id) }}">Edit</a></td>
                                        <td><a href="{{ route('product#delete', $item->id) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">
                                        <h5 class="text-muted text-center">There is no record</h5>
                                    </td>
                                </tr>
                            @endif

                        </tbody>

                    </table>
                    <div class="d-flex justify-content-end">
                        <div class="">{{ $productList->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
