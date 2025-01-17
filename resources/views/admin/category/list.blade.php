@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category Lists</h1>
    </div>
    <hr>

    <div class="">
        <div class="row">
            <div class="col-3 offset-1 mt-5">
                <form method="POST" action="{{ route('category#create') }}" class="form-group mt-1">
                    @csrf
                    <input type="text" name="category" class="form-control" placeholder="Create Your Category...(eg.jewelry,foods etc)">
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror <br>
                    <button type="submit" class="btn btn-primary my-3">Create category</button>
                </form>
            </div>
            <div class="col-1"></div>
            <div class="col-7 my-3">
                <div class="card">
                    <h3 class="my-3 mx-3">Category Lists</h3>
                    <hr>
                    {{-- {{ dd($category_list) }} --}}
                    @foreach ($category_list as $category_lists)
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-1">{{ $loop->iteration }}</div>
                            <div class="col-6">
                                <p>{{ $category_lists->name }}</p>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2">
                                <div class="row">
                                    <form action="{{ route('category#show', $category_lists->id) }}">
                                        <button class="btn btn-sm btn-outline-warning"><i
                                                class="fa-regular fa-pen-to-square"></i></button>
                                    </form>
                                    <form action="{{ route('category#delete', $category_lists->id) }}" method="POST"
                                        class="col">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <span class="d-flex justify-content-end">{{ $category_list->links() }}</span>
            </div>
        </div>
    </div>
@endsection
