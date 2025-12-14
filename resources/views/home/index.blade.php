@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">{{ __('app.home.title') }}</h1>

                <div class="mb-4">
                    <div class="text-muted">{{ __('app.home.student') }}</div>
                    <div class="fs-5 fw-semibold">
                        {{ $student['first_name'] }} {{ $student['last_name'] }}
                        <span class="text-muted">({{ $student['group'] }})</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <a class="btn btn-primary w-100" href="{{ route('client.conferences.index') }}">
                            {{ __('app.home.go_client') }}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary w-100" href="{{ route('employee.conferences.index') }}">
                            {{ __('app.home.go_employee') }}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary w-100" href="{{ route('admin.dashboard') }}">
                            {{ __('app.home.go_admin') }}
                        </a>
                    </div>
                </div>

                <hr class="my-4">

                <div class="text-muted small">
                    {{ __('app.home.note') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
