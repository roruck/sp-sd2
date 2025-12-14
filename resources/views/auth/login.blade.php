@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="h4 mb-3">{{ __('app.auth.login') }}</h1>

      <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">{{ __('app.fields.email') }}</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('app.fields.password') }}</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" name="remember" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">{{ __('app.auth.remember') }}</label>
        </div>

        <button class="btn btn-primary" type="submit">{{ __('app.auth.login') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection
