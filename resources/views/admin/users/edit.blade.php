@extends('layouts.app')

@section('content')
<a class="btn btn-link px-0 mb-3" href="{{ route('admin.users.index') }}">
    ← {{ __('app.back') }}
</a>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h1 class="h5 mb-3">{{ __('app.admin.user_edit_title') }}</h1>

                <form method="POST" action="{{ route('admin.users.update', $user['id']) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.form.first_name') }}</label>
                        <input name="first_name" value="{{ old('first_name', $user['first_name']) }}"
                               class="form-control @error('first_name') is-invalid @enderror">
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.form.last_name') }}</label>
                        <input name="last_name" value="{{ old('last_name', $user['last_name']) }}"
                               class="form-control @error('last_name') is-invalid @enderror">
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.form.email') }}</label>
                        <input name="email" value="{{ old('email', $user['email']) }}"
                               readonly
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div class="form-text">{{ __('app.admin.email_readonly') }}</div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        {{ __('app.form.save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
