@extends('layouts.app')

@section('content')
<a class="btn btn-link px-0 mb-3" href="{{ route('admin.conferences.index') }}">
    ← {{ __('app.back') }}
</a>

<div class="row">
    <div class="col-lg-8">
        <div class="card card-soft">
            <div class="card-body p-4">
                <h1 class="h5 mb-3">{{ __('app.admin.conference_edit_title') }}</h1>

                <form method="POST" action="{{ route('admin.conferences.update', $conference['id']) }}">
                    @csrf
                    @method('PUT')
                    @include('admin.conferences._form', ['mode' => 'edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
