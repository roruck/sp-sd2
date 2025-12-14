@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">{{ __('app.admin.dashboard_title') }}</h1>
                <p class="text-muted mb-4">{{ __('app.admin.dashboard_desc') }}</p>

                <div class="d-flex gap-2 flex-wrap">
                    <a class="btn btn-outline-primary" href="{{ route('admin.users.index') }}">
                        {{ __('app.admin.manage_users') }}
                    </a>
                    <a class="btn btn-outline-primary" href="{{ route('admin.conferences.index') }}">
                        {{ __('app.admin.manage_conferences') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
