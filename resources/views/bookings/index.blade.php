@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.content_header', [
        'label' => 'Bookings',
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Sport</th>
                                        <th>Vendor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Total Amount</th>
                                        <th>Payment Gateway</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        @if (auth()->user()->user_type !== 'admin')
                                            @if ($booking->vendor->user_id == auth()->id())
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->user->name }}</td>
                                                    <td>{{ $booking->user->email }}</td>
                                                    <td>{{ $booking->user->phone }}</td>
                                                    <td>{{ $booking->sport->title }}</td>
                                                    <td>{{ $booking->sport->vendor->name }}</td>
                                                    <td>{{ $booking->date }}</td>
                                                    <td>{{ $booking->from_time }}</td>
                                                    <td>{{ $booking->to_time }}</td>
                                                    <td>{{ $booking->total_billed_amount }}</td>
                                                    <td>{{ $booking->payment_gateway }}</td>

                                                    <td class="d-flex align-items-center">
                                                        &nbsp;
                                                        <form action="{{ route('bookings.destroy', $booking->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class='bx bxs-error-circle'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td>{{ $booking->id }}</td>
                                                <td>{{ $booking->user->name }}</td>
                                                <td>{{ $booking->user->email }}</td>
                                                <td>{{ $booking->user->phone }}</td>
                                                <td>{{ $booking->sport->title }}</td>
                                                <td>{{ $booking->sport->vendor->name }}</td>
                                                <td>{{ $booking->date }}</td>
                                                <td>{{ $booking->from_time }}</td>
                                                <td>{{ $booking->to_time }}</td>
                                                <td>{{ $booking->total_billed_amount }}</td>
                                                <td>{{ $booking->payment_gateway }}</td>

                                                <td class="d-flex align-items-center">
                                                    &nbsp;
                                                    <form action="{{ route('bookings.destroy', $booking->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class='bx bxs-error-circle'></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $bookings->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
