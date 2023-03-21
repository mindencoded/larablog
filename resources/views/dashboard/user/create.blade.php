@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User</div>
                    <div class="card-body">
                        @include('dashboard.partials.response-message')
                        <form
                            action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @include('dashboard.user._form', ['method' => 'POST'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
