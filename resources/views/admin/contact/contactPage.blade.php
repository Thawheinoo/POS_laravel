@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">Contact Message</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Title</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contact as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->user_name ? $item->user_name : $item->user_nickname }}</td>
                                <td>{{ $item->user_email }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->message }}</td>
                                <td style="width: 300px;">
                                    <form action="{{ route('contact#message') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                        <input type="text" name="message" class="form-control mb-2" placeholder="Your Message here...">
                                        <button class="btn btn-primary">Message</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <span>{{ $contact->links() }}</span>
            </div>
        </div>
    </div>
@endsection
