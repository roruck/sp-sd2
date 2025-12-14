@extends('layouts.app')

@section('content')
<h1 class="h4 mb-3">{{ __('app.employee.conferences_title') }}</h1>

<div class="card card-soft">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>{{ __('app.conf.title') }}</th>
                    <th>{{ __('app.conf.date') }}</th>
                    <th>{{ __('app.employee.status') }}</th>
                    <th class="text-end">{{ __('app.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conferences as $c)
                    @php
                        $isPast = \Illuminate\Support\Carbon::parse($c['date'])->lessThan($today);
                    @endphp
                    <tr>
                        <td class="fw-semibold">{{ $c['title'] }}</td>
                        <td>{{ $c['date'] }} {{ $c['time'] }}</td>
                        <td>
                            @if($isPast)
                                <span class="badge text-bg-secondary">{{ __('app.employee.past') }}</span>
                            @else
                                <span class="badge text-bg-success">{{ __('app.employee.planned') }}</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary"
                               href="{{ route('employee.conferences.show', $c['id']) }}">
                                {{ __('app.table.view') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
