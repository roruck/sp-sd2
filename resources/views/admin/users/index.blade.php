@extends('layouts.app')

@section('content')
<h1 class="h4 mb-3">{{ __('app.admin.users_title') }}</h1>

<div class="card card-soft">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>{{ __('app.form.id') }}</th>
                    <th>{{ __('app.form.first_name') }}</th>
                    <th>{{ __('app.form.last_name') }}</th>
                    <th>{{ __('app.form.email') }}</th>
                    <th class="text-end">{{ __('app.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u['id'] }}</td>
                        <td>{{ $u['first_name'] }}</td>
                        <td>{{ $u['last_name'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $u['id']) }}">
                                {{ __('app.table.edit') }}
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
