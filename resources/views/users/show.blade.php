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
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>User Type</th>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ $user->user_type }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>User Roles</th>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-info">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>User Staus</th>
                                    <td>
                                        @if ($user->is_disabled)
                                            <span class="badge badge-danger">Disabled</span><br />
                                            <span>{{ $user->disable_reason }}</span>
                                        @else
                                            <span class="badge badge-success">Active</span><br />
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td class="d-flex align-items-center">
                                        <div class="modal fade" id="disableModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Disable Reason</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('users.status', $user->id) }}" method="POST"
                                                            onsubmit="return confirm('Do you really want to perform this action ?');">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="disable_reason">Disable Reason</label>
                                                                <input type="text"
                                                                    class="form-control {{ $errors->has('disable_reason') ? 'is-invalid' : '' }}"
                                                                    name="disable_reason"
                                                                    value="{{ $user->disable_reason }}">
                                                                @if ($errors->has('disable_reason'))
                                                                    <p class="text-danger">
                                                                        {{ $errors->first('disable_reason') }}
                                                                    </p>
                                                                @endif

                                                            </div>
                                                            <button type="submit" class="btn btn-danger">Disable
                                                                Account</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @if (!$user->is_disabled)
                                            <button class="btn btn-danger"data-toggle="modal"
                                                data-target="#disableModal">Disable Account</button>
                                        @else
                                            <form action="{{ route('users.status', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Do you really want to perform this action ?');">
                                                @csrf

                                                <button type="submit" class="btn btn-success">Enable Account</button>
                                            </form>
                                        @endif
                                        &nbsp;
                                        <form action="{{ route('users.reset', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are u sure want to reset the password ?');">
                                            @csrf
                                            <button class="btn btn-primary">Reset Password</button>
                                        </form>
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
@section('scripts')
    @if ($errors->has('disable_reason'))
        <script>
            $(window).on('load', function() {
                $('#disableModal').modal('show');
            });
        </script>
    @endif
@endsection
