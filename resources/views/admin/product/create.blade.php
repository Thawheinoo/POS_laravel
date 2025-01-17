@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Create Product?</h1>
    </div>
    <hr>

    <div class="">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('product#create') }}" class="form-group mt-1"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col">
                            <img src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" id="output"
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
                                name="name" placeholder="Enter Product Name.." value="{{ old('name') }}">
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
                                    <option value="{{ $item->id }}" @if(old('category_id') == $item->id)  selected  @endif>{{ $item->name }}</option>
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
                                name="price" placeholder="Price.." value="{{ old('price') }}">
                            @error('price')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Stock</label>
                            <input type="text" class="form-control  @error('stock') {{ 'is-invalid' }} @enderror"
                                name="stock" placeholder="Stock.." value="{{ old('stock') }}">
                            @error('stock')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control  @error('description') {{ 'is-invalid' }}@enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="invaild-feedback text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Create" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
