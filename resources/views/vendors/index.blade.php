@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.content_header', [
        'label' => 'Vendors',
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('vendors.create') }}" class="btn btn-success my-2">Add New</a>
                    <div class="card">
                        <div class="card-header">
                            @include('layouts.form_builder', [
                                'action' => route('vendors.index'),
                                'fields' => [
                                    'name' => 'text',
                                    'tax_number' => 'text',
                                    'city' => 'text',
                                ],
                            ])
                        </div>
                        <div class="card-body p-0">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Owner Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>PAN</th>
                                        <th>Status</th>
                                        <th>Banned</th>
                                        <th>Close</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->id }}</td>
                                            <td>

                                                <img src="{{ $vendor->display_image ? $vendor->display_image->getUrl() : '' }}"
                                                    alt="{{ $vendor->name }}" height="100" width="100">
                                            </td>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->user->name }}</td>
                                            <td>{{ $vendor->user->phone }}</td>
                                            <td>{{ $vendor->address }}, {{ App\Models\Vendor::CITIES[$vendor->city] }}</td>
                                            <td>{{ $vendor->tax_number }}</td>
                                            <td>{{ $vendor->status }}</td>
                                            <td>{!! $vendor->is_banned
                                                ? "<span class='badge badge-danger'>Banned</span>"
                                                : "<span class='badge badge-success'>Active</span>" !!}
                                            </td>
                                            <td>{!! $vendor->is_close
                                                ? "<span class='badge badge-danger'>Closed</span>"
                                                : "<span class='badge badge-success'>Open</span>" !!}</td>
                                            <td class="d-flex align-items-center">

                                                <a href="{{ route('vendors.edit', $vendor->id) }}"
                                                    class="btn btn-sm btn-info"><i class='bx bx-edit-alt'></i></a>
                                                &nbsp;
                                                <a href="{{ route('vendors.show', $vendor->id) }}"
                                                    class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                                                &nbsp;
                                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class='bx bxs-error-circle'></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $vendors->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
