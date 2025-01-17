@extends('user.layouts.master')

@section('content')
    {{-- Begin Page Content --}}
    <div class="container">

        <div class="mt-5 text-white">hello</div>
        <div class="mt-5 text-white">hello</div>
        <div class="mt-2 text-white">hello</div>

        {{-- --DataTables Example-- --}}
        <div class="card shadow mb-4 col">
            <div class="card-header py-3">
                <div class="">
                    <div>
                        <h6 class="m-0 fs-4 font-weight-bold text-primary">Edit Admin Profile ? </h6>
                    </div>
                </div>
            </div>

            <form action="{{ route('user#edit', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="@if (Auth::user()->profile) {{ Auth::user()->profile }} @endif"
                    name="oldImage">

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">

                            <img src="{{ Auth::user()->profile ? asset('profile_img/' . Auth::user()->profile) : asset('admin/img/undraw_profile.svg') }}"
                                alt="" class="img-thumbnail img-profile" id="output">
                            <input type="file" class="form-control mt-2 @error('image') {{ 'is-invalid' }} @enderror"
                                name="image" onchange="loadFile(event)">
                            @error('image')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name'){{ 'is-invalid' }} @enderror"
                                            placeholder="Name..."
                                            value="{{ old('name', Auth::user()->name ? Auth::user()->name : Auth::user()->nickname) }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email'){{ 'is-invalid' }} @enderror"
                                            placeholder="Email..." value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone'){{ 'is-invalid' }} @enderror"
                                            placeholder="09xxxxxxxx" value="{{ old('phone', Auth::user()->phone) }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address'){{ 'is-invalid' }} @enderror"
                                            placeholder="Address..." value="{{ old('address', Auth::user()->address) }}">
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
