@extends('layouts.app')
@section('content')
    <div class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Vendor
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vendors.update', $vendor->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('vendors.form')


                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after_scripts')
    <script>
        $('.file-upload').filepond({
            allowMultiple: true,
            storeAsFile: true,
            allowReorder: true,
        });
    </script>
@endpush
