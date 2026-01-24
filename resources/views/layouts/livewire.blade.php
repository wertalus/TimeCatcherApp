<!doctype html>
@php app()->setLocale(auth()->check() ? (auth()->user()->settings->language ?? 'pl') : 'pl'); @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="referrer" content="strict-origin-when-cross-origin">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.2.0-rc1/css/bootstrap5-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.2.0-rc1/js/bootstrap5-toggle.ecmas.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/sidebars.css' ,'resources/js/app.js'])
</head>
<body data-bs-theme="{{ auth()->check() && auth()->user()->settings ? auth()->user()->settings->theme : 'light' }}">
    <div id="app">
        @livewire('nav-bar')
        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
    <script>
        window.userSettings = @json(auth()->check() ? auth()->user()->settings : null);
    </script>
    @livewireScripts
</body>
</html>
