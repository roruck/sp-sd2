@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">{{ __('app.admin.conferences_title') }}</h1>
    <a class="btn btn-primary" href="{{ route('admin.conferences.create') }}">
        {{ __('app.admin.create_conference') }}
    </a>
</div>

<div class="card card-soft">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>{{ __('app.conf.title') }}</th>
                    <th>{{ __('app.conf.date') }}</th>
                    <th>{{ __('app.conf.time') }}</th>
                    <th class="text-end">{{ __('app.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conferences as $c)
                    @php
                        $isPast = \Illuminate\Support\Carbon::parse($c['date'])->lessThan($today);
                        $formId = 'delete-form-' . $c['id'];
                    @endphp
                    <tr>
                        <td class="fw-semibold">{{ $c['title'] }}</td>
                        <td>{{ $c['date'] }}</td>
                        <td>{{ $c['time'] }}</td>
                        <td class="text-end">
                            <div class="table-actions justify-content-end">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.conferences.edit', $c['id']) }}">
                                    {{ __('app.table.edit') }}
                                </a>

                                <form id="{{ $formId }}" method="POST" action="{{ route('admin.conferences.destroy', $c['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                @if($isPast)
                                    <button class="btn btn-sm btn-outline-secondary" disabled title="{{ __('app.admin.cannot_delete_past') }}">
                                        {{ __('app.table.delete') }}
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-outline-danger" type="button" onclick="confirmDelete('{{ $formId }}')">
                                        {{ __('app.table.delete') }}
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
