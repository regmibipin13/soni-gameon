@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.content_header', [
        'label' => 'Sports Categories',
    ])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('sports-categories.create') }}" class="btn btn-success my-2">Add New</a>
                    <div class="card">
                        <div class="card-header">
                            @include('layouts.form_builder', [
                                'action' => route('vendors.index'),
                                'fields' => [
                                    'name' => 'text',
                                ],
                            ])
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{ $cat->id }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            @if ($cat->is_enabled)
                                                <span class="badge badge-pill badge-success">Enabled</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Disabled</span>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('sports-categories.edit', $cat->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            &nbsp;
                                            <form action="{{ route('sports-categories.destroy', $cat->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
