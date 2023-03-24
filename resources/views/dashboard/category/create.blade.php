@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>
                    <div class="card-body">
                        @include('dashboard.partials.response-message')
                        <form
                            action="{{ route('category.store') }}" method="POST">
                            @csrf
                            @include('dashboard.category._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
