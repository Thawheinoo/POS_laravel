@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-2">
        <h1 class="h3 mb-0 text-gray-800">Edit Product Page</h1>
    </div>
    <div class="">
        <a href="{{ route('product#listpage') }}" class="btn btn-primary btn-sm my-2 ms-4">Back</a>
    </div>
    <hr>

    <div class="">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('product#edit') }}" class="form-group mt-1"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $product_data->id }}" name="product_id">
                    <input type="hidden" value="{{ $product_data->image }}" name="product_oldimage">

                    <div class="row">
                        <div class="mb-3 col">
                            <img src="{{ asset('product_img/'.$product_data->image) }}" alt="" id="output"
                                style="height: 200px;" class=" img-profile img-thumbnail w-100">
                        </div>
                        <div class="m-auto col">
                            <input type="file" class="form-control  @error('image') {{ 'is-invalid' }}@enderror"
                                name="image" onchange="loadFile(event)">
                            @error('image')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('name') {{ 'is-invalid' }}@enderror"
                                name="name" placeholder="Enter Product Name.." value="{{ old('name', $product_data->name) }}">
                            @error('name')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <label class="form-label">Category Name</label>
                            <select name="category_id" id=""
                                class="form-control  @error('category_id') {{ 'is-invalid' }}@enderror">
                                <option value="">Choose Category</option>
                                @foreach ($category_data as $item)
                                    <option value="{{ $item->id}}" @if(old('category_id', $product_data->category_id) == $item->id)  selected  @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control  @error('price') {{ 'is-invalid' }} @enderror"
                                name="price" placeholder="Price.." value="{{ old('price', $product_data->price) }}">
                            @error('price')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Stock</label>
                            <input type="text" class="form-control  @error('stock') {{ 'is-invalid' }} @enderror"
                                name="stock" placeholder="Stock.." value="{{ old('stock' , $product_data->stock) }}">
                            @error('stock')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control  @error('description') {{ 'is-invalid' }}@enderror">{{ old('description', $product_data->description) }}</textarea>
                        @error('description')
                            <small class="invaild-feedback text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
