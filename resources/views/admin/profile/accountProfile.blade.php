@extends('admin.layouts.master')

@section('content')
    {{-- Begin Page Content --}}
    <div class="container-fluid">
        <!--DataTables Example-->
        <div class="card shadow mb-4 col">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
                    </div>
                </div>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="row col-10 offset-1">
                        <div class="col-3">
                            <img src="{{ asset(Auth::user()->profile ? 'profile_img/' . Auth::user()->profile : 'admin/img/undraw_profile.svg') }}"
                                alt="" class="img-profile img-thumbnail" id="output">
                        </div>
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="row mt-3">
                                <div class="col-2 h5">
                                    Name:
                                </div>
                                <div class="col h5">{{ Auth::user()->name ? Auth::user()->name : Auth::user()->nickname }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2 h5">
                                    Email:
                                </div>
                                <div class="col h5">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2 h5">
                                    Address:
                                </div>
                                <div class="col h5">{{ Auth::user()->address ? Auth::user()->address : '.....' }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2 h5">
                                    Phone:
                                </div>
                                <div class="col h5">{{ Auth::user()->phone ? Auth::user()->phone : '.....' }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2 h5">
                                    Role:
                                </div>
                                <div class="col h5 text-danger">{{ Auth::user()->role }}</div>
                            </div>
                            <div class="row mt-3 d-flex">
                                <a href="{{ route('profile#editpage') }}" class="btn btn-primary mx-2">Edit Profile</a>
                                <a href="{{ route('profile#changePassword') }}" class="btn btn-secondary">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
