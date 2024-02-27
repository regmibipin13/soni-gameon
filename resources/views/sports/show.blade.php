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
                                    <td>{{ $sport->id }}</td>
                                </tr>
                                <tr>
                                    <th>Images</th>
                                    <td>
                                        @foreach ($sport->getMedia() as $image)
                                            <a href="{{ $image->getUrl() ? $image->getUrl() : '' }}" target="_blank">
                                                <img src="{{ $image->getUrl() ? $image->getUrl() : '' }}"
                                                    alt="{{ $sport->title }}" width="300" height="300"></a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $sport->title }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $sport->sport_category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Times</th>
                                    <td>Opens at <span class="badge badge-success">{{ $sport->opening_time }}</span><br>
                                        Closes at <span class="badge badge-danger">{{ $sport->closing_time }}</span></td>
                                </tr>
                                <tr>
                                    <th>Owner Name</th>
                                    <td>{{ $sport->vendor->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Email</th>
                                    <td>{{ $sport->vendor->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Phone</th>
                                    <td>{{ $sport->vendor->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Tax Number (PAN)</th>
                                    <td>
                                        {{ $sport->vendor->tax_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>
                                        {{ $sport->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Google Maps</th>
                                    <td>
                                        <a href="{{ $sport->vendor->google_map_link }}" target="_blank">Google Map Link</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>
                                        {{ $sport->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>
                                        {{ $sport->created_at->format('Y M d') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Last Updated At</th>
                                    <td>
                                        {{ $sport->updated_at->format('Y M d') }}
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
