@extends('layouts.app')
@section('content')
    <div class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Create Permissions
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.store') }}" method="POST">
                                @csrf

                                @include('permissions.form')


                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
