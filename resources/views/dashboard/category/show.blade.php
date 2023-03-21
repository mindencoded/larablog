@php use App\Models\Category; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Category</div>
                    <div class="card-body">
                        @if(isset($category) && $category instanceof Category)
                            <table class="table table-bordered table-responsive">
                                <tbody>
                                <tr>
                                    <th>Id</th>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated at</th>
                                    <td>{{ $category->updated_at }}</td>
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
