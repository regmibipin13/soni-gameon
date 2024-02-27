@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.content_header', [
        'label' => 'Sports',
    ])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('sports.create') }}" class="btn btn-success my-2">Add New</a>
                    <div class="card">
                        @if (auth()->user()->user_type == 'admin')
                            <div class="card-header">
                                @include('layouts.form_builder', [
                                    'action' => route('sports.index'),
                                    'fields' => [
                                        'title' => 'text',
                                        'city' => [
                                            'multiple' => false,
                                            'type' => 'dynamic',
                                            'option' => App\Models\Vendor::CITIES,
                                        ],
                                        'vendor_id' => [
                                            'multiple' => false,
                                            'type' => 'dynamic',
                                            'option' => $vendors,
                                        ],
                                        'sport_category_id' => [
                                            'multiple' => false,
                                            'type' => 'dynamic',
                                            'option' => $categories,
                                        ],
                                    ],
                                ])
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table table-bordered table-striped ">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Vendor</th>
                                    <th>Sport Category</th>
                                    <th>Price</th>
                                    {{-- <th>Photos</th> --}}
                                    <th>Action</th>
                                </tr>
                                @foreach ($sports as $sport)
                                    @if (auth()->user()->user_type !== 'admin')
                                        @if ($sport->vendor->user_id == auth()->id())
                                            <tr>
                                                <td>{{ $sport->id }}</td>
                                                <td>{{ $sport->title }}</td>
                                                <td>
                                                    {{ $sport->vendor->name }}
                                                </td>
                                                <td>{{ $sport->sport_category->name }}</td>
                                                <td>Rs. {{ $sport->price_per_hour }}</td>
                                                {{-- <td>
                                            @foreach ($sport->getMedia() as $media)
                                                <img src="{{ $media->getUrl() }}" alt="Image" width="100"
                                                    height="100">
                                            @endforeach
                                        </td> --}}
                                                <td class="d-flex align-items-center">
                                                    <a href="{{ route('sports.edit', $sport->id) }}"
                                                        class="btn btn-sm btn-info"><i class='bx bx-edit-alt'></i></a>
                                                    &nbsp;
                                                    <a href="{{ route('sports.show', $sport->id) }}"
                                                        class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                                                    &nbsp;
                                                    <form action="{{ route('sports.destroy', $sport->id) }}" method="POST"
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
                                            <td>{{ $sport->id }}</td>
                                            <td>{{ $sport->title }}</td>
                                            <td>
                                                {{ $sport->vendor->name }}
                                            </td>
                                            <td>{{ $sport->sport_category->name }}</td>
                                            <td>Rs. {{ $sport->price_per_hour }}</td>
                                            {{-- <td>
                                            @foreach ($sport->getMedia() as $media)
                                                <img src="{{ $media->getUrl() }}" alt="Image" width="100"
                                                    height="100">
                                            @endforeach
                                        </td> --}}
                                            <td class="d-flex align-items-center">
                                                <a href="{{ route('sports.edit', $sport->id) }}"
                                                    class="btn btn-sm btn-info"><i class='bx bx-edit-alt'></i></a>
                                                &nbsp;
                                                <a href="{{ route('sports.show', $sport->id) }}"
                                                    class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                                                &nbsp;
                                                <form action="{{ route('sports.destroy', $sport->id) }}" method="POST"
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
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $sports->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
