@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 card">
                <div class="row d-flex justify-content-between">
                    <div class="col-1"></div>
                    <div class="card-title h3 text-dark mt-3 col-8"> Create New Admin Account</div>
                    <div class="col-3 mt-3"><a href="{{ route('view#adminListPage') }}" class="btn btn-primary">View Admin
                            Lists</a></div>
                </div>
                <hr>
                <form action="{{ route('create#adminAccount') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                                placeholder="Enter Name..">
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
                                placeholder="Enter Email..">
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror "
                                placeholder="Enter Password..">
                            @error('password')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control "
                                placeholder="Enter Repeat Password..">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary " value="Create">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
