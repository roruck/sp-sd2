@extends('layouts.app')

@section('content')
<a class="btn btn-link px-0 mb-3" href="{{ route('employee.conferences.index') }}">
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

    <div class="col-lg-5">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">{{ __('app.employee.registered_clients') }}</h2>

                @if (empty($registrations))
                    <div class="alert alert-info mb-0">{{ __('app.employee.no_registrations') }}</div>
                @else
                    <ul class="list-group">
                        @foreach ($registrations as $r)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $r['name'] }}</span>
                                <span class="text-muted small">{{ $r['email'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
