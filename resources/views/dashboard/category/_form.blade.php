<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control  @error('title') is-invalid  @enderror" id="title" name="title"
           aria-describedby="validationTitle"
           value="{{ old('title', $category->title) }}">
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
           value="{{ old('url_clean', $category->url_clean) }}">
    @error('url_clean')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>

