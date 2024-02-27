@extends('layouts.app')
@section('content')
    <div class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Permission
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
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
