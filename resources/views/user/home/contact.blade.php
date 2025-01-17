@extends('user.layouts.master')

@section('content')
    <div class="mt-5 text-white">hello world</div>
    <div class="mt-5 text-white">hello world</div>
    <div class="mt-5 text-white">hello world</div>

    <div class="container mt-5 m-auto" style="height: 700px;">
        <div class="card">
            <div class="card-header">
                <h1>How Can We help You?</h2>
            </div>

            <div class="card-body row">
                <table class="table table-hover col">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contact as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->message }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


                <div class="col-5 offset-1">
                    <form action="{{ route('contact') }}" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="text" name="title" placeholder="Title..."
                            class="form-control mb-3  @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        <textarea name="message" id="" cols="30" rows="10"
                            class="form-control @error('message') is-invalid @enderror" placeholder="Message Box...">{{ old('message') }}</textarea>

                        <button class="btn btn-secondary mt-3">Message</button>

                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
