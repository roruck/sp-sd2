@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">{{ __('app.client.conferences_title') }}</h1>
    <span class="badge badge-soft">{{ __('app.client.only_planned') }}</span>
</div>

@if (empty($conferences))
    <div class="alert alert-info">{{ __('app.client.no_conferences') }}</div>
@else
    <div class="card card-soft">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>{{ __('app.conf.title') }}</th>
                        <th>{{ __('app.conf.date') }}</th>
                        <th>{{ __('app.conf.time') }}</th>
                        <th>{{ __('app.conf.address') }}</th>
                        <th class="text-end">{{ __('app.table.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($conferences as $c)
                        <tr>
                            <td class="fw-semibold">{{ $c['title'] }}</td>
                            <td>{{ $c['date'] }}</td>
                            <td>{{ $c['time'] }}</td>
                            <td>{{ $c['address'] }}</td>
                            <td class="text-end">
                                <div class="table-actions justify-content-end">
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="{{ route('client.conferences.show', $c['id']) }}">
                                        {{ __('app.table.view') }}
                                    </a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('client.conferences.show', $c['id']) }}#register">
                                        {{ __('app.client.register') }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection
