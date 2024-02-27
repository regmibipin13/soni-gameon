@extends('layouts.app')

@section('content')
    @include('layouts.content_header')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $vendor->id }}</td>
                                </tr>
                                <tr>
                                    <th>Display Image</th>
                                    <td>
                                        <a href="{{ $vendor->display_image ? $vendor->display_image->getUrl() : '' }}"
                                            target="_blank">
                                            <img src="{{ $vendor->display_image ? $vendor->display_image->getUrl() : '' }}"
                                                alt="{{ $vendor->name }}" width="300" height="300"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $vendor->name }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Name</th>
                                    <td>{{ $vendor->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Email</th>
                                    <td>{{ $vendor->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Phone</th>
                                    <td>{{ $vendor->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>
                                        {{ $vendor->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>
                                        {{ $vendor->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tax Number (PAN)</th>
                                    <td>
                                        {{ $vendor->tax_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Google Maps</th>
                                    <td>
                                        <a href="{{ $vendor->google_map_link }}" target="_blank">Google Map Link</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Vendor Staus</th>
                                    <td>
                                        {{ $vendor->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Current Close Staus</th>
                                    <td>
                                        {{ $vendor->is_close ? 'Closed' : 'Open' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Current Banned Staus</th>
                                    <td>
                                        {{ $vendor->is_banned ? 'Banned' : 'Active' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Current Banned Reason</th>
                                    <td>
                                        {{ $vendor->is_banned ? $vendor->banned_reason : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Registered At</th>
                                    <td>
                                        {{ $vendor->created_at->format('Y M d') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Last Updated At</th>
                                    <td>
                                        {{ $vendor->updated_at->format('Y M d') }}
                                    </td>
                                </tr>


                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
