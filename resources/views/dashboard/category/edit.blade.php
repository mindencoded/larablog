@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        <form
                            action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('dashboard.category._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
