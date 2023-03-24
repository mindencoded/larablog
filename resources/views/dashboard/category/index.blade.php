@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories List</div>
                    <div class="card-body">
                        @include('dashboard.partials.response-message')
                        <div class="mb-3">
                            <a rel="stylesheet" class="btn btn-primary btn-sm" href="{{ route('category.create') }}">Create
                                New Category</a>
                        </div>
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at->format('Y m d') }}</td>
                                    <td>{{ $category->updated_at->format('Y m d') }}</td>
                                    <td class="text-center">
                                        <a rel="stylesheet" class="btn btn-success btn-sm"
                                           href="{{ route('category.show', $category->id) }}">Show</a>
                                        <a rel="stylesheet" class="btn btn-success btn-sm"
                                           href="{{ route('category.edit', $category->id) }}">Edit</a>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
