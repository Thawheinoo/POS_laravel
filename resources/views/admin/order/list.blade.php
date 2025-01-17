@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Lists</h1>
    </div>
    <hr>

    <div class="container">
        <div class="d">

        </div>
        <div class="card-body">
            <form action="{{ route('order#listPage') }}" method="get">
                <div class="mb-3 d-flex justify-content-end">
                    <input type="text" name="searchKey" placeholder="Search..." class="form-control w-25">
                    <button class="btn btn-sm btn-outline-primary" style="margin-left: 5px;"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <table class="table table-hover text-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Code</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <input type="hidden" class="order_code" value="{{ $item->order_code }}">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('order#detailPage', $item->order_code) }}">{{ $item->order_code }}</a>
                            </td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->created_at->format('j-F-Y') }}</td>
                            <td>
                                <select name="status" id="" class="form-select status">
                                    <option value="0" @selected($item->status == '0')>Pending</option>
                                    <option value="1" @selected($item->status == '1')>Accepct</option>
                                    <option value="2" @selected($item->status == '2')>Reject</option>
                                </select>
                            </td>
                            @if ($item->status == '0')
                                <td>
                                    <i class="fa-regular fa-clock text-warning"></i>
                                </td>
                            @endif
                            @if ($item->status == '1')
                                <td>
                                    <i class="fa-regular fa-circle-check text-success"></i>
                                </td>
                            @endif
                            @if ($item->status == '2')
                                <td>
                                    <i class="fa-solid fa-xmark text-danger"></i>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('status')
    <script>
        $(document).ready(function() {
            $('.status').change(function() {
                $status = $(this).val();
                $order_code = $(this).parents('tr').find('.order_code').val();

                $data = {
                    'status': $status,
                    'order_code': $order_code,
                };

                $.ajax({
                    type: 'get',
                    url: '{{ route('order#changeStatus') }}',
                    data: $data,
                    dataType: 'json',
                    success: function(res) {
                        location.href = '{{ route('order#listPage') }}';
                    }
                });

            })
        })
    </script>
@endsection
