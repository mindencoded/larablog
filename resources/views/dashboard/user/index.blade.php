@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users List</div>
                    <div class="card-body">
                        @include('dashboard.partials.response-message')
                        <div class="mb-3">
                            <a rel="stylesheet" class="btn btn-primary btn-sm" href="{{ route('user.create') }}">Create
                                New User</a>
                        </div>
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ isset($user->role) ? $user->role->name : '' }}</td>
                                    <td>{{ $user->created_at->format('Y m d') }}</td>
                                    <td>{{ $user->updated_at->format('Y m d') }}</td>
                                    <td class="text-center">
                                        <a rel="stylesheet" class="btn btn-success btn-sm"
                                           href="{{ route('user.show', $user->id) }}">Show</a>
                                        <a rel="stylesheet" class="btn btn-success btn-sm"
                                           href="{{ route('user.edit', $user->id) }}">Edit</a>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: left;">
                                                            Are you sure delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
