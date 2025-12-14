@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="h4 mb-3">{{ __('app.auth.register') }}</h1>

      <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">{{ __('app.fields.first_name') }}</label>
          <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" required>
          @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('app.fields.last_name') }}</label>
          <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" required>
          @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

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

        <div class="mb-3">
          <label class="form-label">{{ __('app.fields.password_confirm') }}</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">{{ __('app.auth.register') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection
