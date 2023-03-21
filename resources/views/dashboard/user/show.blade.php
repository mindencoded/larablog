@php use App\Models\User; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show user</div>
                    <div class="card-body">
                        @if(isset($user) && $user instanceof User)
                            <table class="table table-bordered table-responsive">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->role->name }}</td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated at</th>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                           <div class="text-center">
                               No hay nada para mostrar.
                           </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
