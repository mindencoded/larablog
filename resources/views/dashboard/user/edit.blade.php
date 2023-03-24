@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        @include('dashboard.partials.response-message')
                        <form
                            action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('dashboard.user._form', ['method' => 'PUT'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
