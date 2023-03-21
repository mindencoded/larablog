@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        @include('dashboard.post._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
