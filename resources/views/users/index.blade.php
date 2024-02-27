@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.content_header', [
        'label' => 'Users',
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('users.create') }}" class="btn btn-success my-2">Add New</a>
                    <div class="card">
                        <div class="card-header">
                            @include('layouts.form_builder', [
                                'action' => route('users.index'),
                                'fields' => [
                                    'name' => 'text',
                                    'email' => 'email',
                                    'phone' => 'number',
                                    'user_type' => [
                                        'multiple' => false,
                                        'type' => 'static',
                                        'options' => ['admin', 'customer', 'vendor'],
                                    ],
                                ],
                            ])
                        </div>
                        <div class="card-body p-0">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @php
                                                    $alert = 'primary';
                                                    if ($user->user_type == 'admin') {
                                                        $alert = 'danger';
                                                    } elseif ($user->user_type == 'vendor') {
                                                        $alert = 'success';
                                                    }
                                                @endphp
                                                <span class="badge badge-{{ $alert }}">{{ $user->user_type }}</span>
                                            </td>
                                            <td>
                                                @if ($user->user_type == 'admin')
                                                    @foreach ($user->roles as $role)
                                                        <span class="badge badge-info">{{ $role->name }}</span>
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>
                                                &nbsp;
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">
                                                    View
                                                </a>
                                                &nbsp;
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    onsubmit="return confirm('Do you really want to delete user ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (count($users) <= 0)
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
