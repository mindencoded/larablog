@php use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Post</div>
                    <div class="card-body">
                        @if(isset($post) && $post instanceof Post)
                            <table class="table table-bordered table-responsive">
                                <tbody>
                                <tr>
                                    <th>Id</th>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th>Posted</th>
                                    <td>{{ $post->posted }}</td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated at</th>
                                    <td>{{ $post->updated_at }}</td>
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
