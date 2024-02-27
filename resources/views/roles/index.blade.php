@extends('layouts.app')
@section('content')
    @include('layouts.content_header', [
        'label' => 'Roles',
    ])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-2">
                    <a href="{{ route('roles.create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @include('layouts.form_builder', [
                                'action' => route('roles.index'),
                                'fields' => [
                                    'name' => 'text',
                                ],
                            ])
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        </th>
                                        <th>
                                            Permissions
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($roles) > 0)
                                        @foreach ($roles as $p)
                                            <tr>
                                                <td>
                                                    {{ $p->id }}
                                                </td>
                                                <td>
                                                    {{ $p->name }}
                                                </td>
                                                <td>
                                                    @foreach ($p->permissions as $per)
                                                        <span class="badge badge-pill badge-success">
                                                            {{ $per->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="d-flex align-items-center">
                                                    <a href="{{ route('roles.edit', $p->id) }}"
                                                        class="btn btn-sm btn-info">Edit</a>
                                                    &nbsp;
                                                    <form action="{{ route('roles.destroy', $p->id) }}" method="POST"
                                                        onsubmit="return confirm('Do you really want to delete role ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Data Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
