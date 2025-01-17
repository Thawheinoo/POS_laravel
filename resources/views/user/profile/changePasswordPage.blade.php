@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello</div>
    <div class="mt-5 text-white">hello</div>
    <div class="mt-3 text-white">hello</div>

    <!-- Page Heading -->
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Password Change?</h1>
        </div>
        <hr>

        <div class="">
            <div class="row">
                <div class="col-6 my-3 offset-3">
                    <form method="POST" action="{{ route('changePassword#change') }}" class="form-group mt-1">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control @error('oldPassword') {{ 'is-invalid' }}@enderror"
                                name="oldPassword" placeholder="Enter Old password..">
                            @error('oldPassword')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control  @error('newPassword') {{ 'is-invalid' }} @enderror"
                                name="newPassword" placeholder="Password New..">
                            @error('newPassword')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comfirm Password</label>
                            <input type="password"
                                class="form-control  @error('confirmPassword') {{ 'is-invalid' }} @enderror"
                                name="confirmPassword" placeholder="Password confirmation..">
                            @error('confirmPassword')
                                <small class="invaild-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Change Password" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection