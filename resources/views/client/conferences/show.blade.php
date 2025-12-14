@extends('layouts.app')

@section('content')
<a class="btn btn-link px-0 mb-3" href="{{ route('client.conferences.index') }}">
    ← {{ __('app.back') }}
</a>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h1 class="h4 mb-2">{{ $conference['title'] }}</h1>
                <div class="text-muted mb-3">{{ __('app.conf.speakers') }}: {{ $conference['speakers'] }}</div>

                <dl class="row mb-0">
                    <dt class="col-sm-3">{{ __('app.conf.date') }}</dt>
                    <dd class="col-sm-9">{{ $conference['date'] }}</dd>

                    <dt class="col-sm-3">{{ __('app.conf.time') }}</dt>
                    <dd class="col-sm-9">{{ $conference['time'] }}</dd>

                    <dt class="col-sm-3">{{ __('app.conf.address') }}</dt>
                    <dd class="col-sm-9">{{ $conference['address'] }}</dd>

                    <dt class="col-sm-3">{{ __('app.conf.description') }}</dt>
                    <dd class="col-sm-9">{{ $conference['description'] }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-5" id="register">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">{{ __('app.client.register_title') }}</h2>

                <form method="POST" action="{{ route('client.conferences.register', $conference['id']) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.form.name') }}</label>
                        <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.form.email') }}</label>
                        <input name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        {{ __('app.client.register') }}
                    </button>

                    <div class="text-muted small mt-3">
                        {{ __('app.client.register_note') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
