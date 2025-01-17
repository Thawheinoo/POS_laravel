@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 card">
                <div class="card-title h3 d-flex justify-content-center text-dark mt-3">Add Payment Methods</div>
                <hr>
                <form action="{{ route('paymetn#add') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Account Name</label>
                            <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control @error('account_name') is-invalid @enderror "
                                placeholder="Enter Account Name..">
                            @error('account_name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Account Number</label>
                            <input type="text" name="account_number" value="{{ old('account_number') }}" class="form-control @error('account_number') is-invalid @enderror "
                                placeholder="Enter Account Number..">
                            @error('account_number')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Accout Type</label>
                            <input type="text" name="type" value="{{ old('type') }}"
                                class="form-control @error('type') is-invalid @enderror "
                                placeholder="Enter Account Type (eg. KBZ , KBZ Pay , AYA , MAB )..">
                            @error('type')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary mx-2" value="Add Bank Account">
                            <a href="{{ route('payment#allAccount') }}" class="btn btn-secondary">View All Bank Account</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
