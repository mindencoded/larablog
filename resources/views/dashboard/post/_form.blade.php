@php
    use App\Models\Post;
@endphp
@include('dashboard.partials.response-message')
<form action="{{ isset($post) && $post instanceof Post ? route('post.update', $post->id) : route('post.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($post))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control  @error('title') is-invalid  @enderror" id="title" name="title"
               aria-describedby="validationTitle"
               value="{{ isset($post) && $post instanceof Post ? $post->title : old('title') }}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="url_clean" class="form-label">Url</label>
        <input type="text" class="form-control  @error('url_clean') is-invalid  @enderror" id="url_clean"
               name="url_clean"
               value="{{ isset($post) && $post instanceof Post ? $post->url_clean : old('url_clean') }}">
        @error('url_clean')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control  @error('category_id') is-invalid  @enderror" id="category_id"
                name="category_id">
            <option value=""> -- Select a category --</option>
            @if(isset($categories))
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}" @if((isset($post) && $post instanceof Post && $post->category_id == $key) || old('category_id') == $key ) selected @endif>{{ $value }}</option>
                @endforeach
            @endif
        </select>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="posted" class="form-label">Posted</label>
        <select class="form-control" id="posted" name="posted">
            @include('dashboard.partials.options-yes-no', ['value' => (isset($post) && $post instanceof Post ? $post->posted : 'not')])
        </select>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid  @enderror" id="content"
                  name="content">{{ isset($post) && $post instanceof Post ? $post->content : old('content') }}</textarea>
        @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Image</label>
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid  @enderror" value="{{ isset($post) && $post instanceof Post && $post->post_images()->count() ? $post->post_images()->first()->image : '' }}">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            window.ClassicEditor.create(document.querySelector('#content'))
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
