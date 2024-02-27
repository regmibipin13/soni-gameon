@extends('layouts.app')
@section('content')
    <div class="content py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Sports Category
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sports-categories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @include('sports-categories.form')


                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
