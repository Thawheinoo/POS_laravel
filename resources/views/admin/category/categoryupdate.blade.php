@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category List Update</h1>
    </div>
    <hr>

    <div class="">
        <div class="row">
            <div class="col-6 my-3 offset-2">
                <form method="POST" action="{{ route('category#update') }}" class="form-group mt-1">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" name="category" class="form-control" placeholder="Enter Category...."
                        value="{{ $data->name }}">
                    <input type="submit" class="btn btn-primary my-3" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
