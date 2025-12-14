<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.app_name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        window.sd1Texts = {
            deleteTitle: @json(__('app.js.delete_title')),
            deleteText: @json(__('app.js.delete_text')),
            deleteConfirm: @json(__('app.js.delete_confirm')),
            deleteCancel: @json(__('app.js.delete_cancel')),
        };
    </script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('app.app_name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('app.nav.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.conferences.index') }}">{{ __('app.nav.client') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.conferences.index') }}">{{ __('app.nav.employee') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('app.nav.admin') }}</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-light btn-sm" disabled>
                    {{ __('app.nav.logout') }}
                </button>

                <span class="text-white-50 small">
                    @php
                        $fn = $currentUser['first_name'] ?? config('student.first_name');
                        $ln = $currentUser['last_name'] ?? config('student.last_name');
                    @endphp
                    {{ $fn }} {{ $ln }}
                </span>
            </div>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>
</body>
</html>
