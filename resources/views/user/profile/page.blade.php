@extends('user.layouts.master')


@section('content')
    <div class="my-5 text-white">hello</div>
    <div class="my-5 text-white">hello</div>
    <div class="container">
        <!--DataTables Example-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary fs-4">Account Information</h6>
                    </div>
                </div>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="row col-10 offset-1">
                        <div class="col-4">
                            <img src="{{ Auth::user()->profile ? asset('profile_img/'.Auth::user()->profile) : asset('admin/img/undraw_profile.svg')  }}" alt="" class="img-profile img-thumbnail" id="output">
                        </div>
                        <div class="col-2"></div>
                        <div class="col">
                            <div class="row mt-3">
                                <div class="col-3 h5">
                                    Name:
                                </div>
                                <div class="col h5">{{ Auth::user()->name ? Auth::user()->name : Auth::user()->nickname}}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 h5">
                                    Email:
                                </div>
                                <div class="col h5">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 h5">
                                    Address:
                                </div>
                                <div class="col h5">{{ Auth::user()->address }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 h5">
                                    Phone:
                                </div>
                                <div class="col h5">{{ Auth::user()->phone }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 h5">
                                    Role:
                                </div>
                                <div class="col h5 text-danger">{{ Auth::user()->role }}</div>
                            </div>
                            <div class="row mt-3">
                                <a href="{{ route('user#editpage') }}" class= "btn btn-outline-secondary w-25 text-dark d-flex justify-content-center align-items-center">Edit Profile</a>
                                <a href="{{ route('changePassword#page') }}" class="btn btn-outline-secondary w-25 ms-2 text-dark">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
