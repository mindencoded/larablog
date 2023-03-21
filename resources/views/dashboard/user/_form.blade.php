<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control  @error('name') is-invalid  @enderror" id="name" name="name"
           aria-describedby="validationTitle"
           value="{{ old('name', $user->name) }}">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="email"
           name="email"
           value="{{ old('email', $user->email) }}">
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
@if($method == 'POST')
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password"
           name="password"
           value="{{ old('password', $user->password) }}">
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
@endif
<button type="submit" class="btn btn-primary">Submit</button>

