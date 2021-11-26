<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Mrs. Haze"/>
    <link rel="canonical" href="{{ strtolower(request()->url()) }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <meta name="robots" content="index, follow"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class='{{ request()->routeIs('mrshaze') ? 'bodyView' : 'bg-gray-100' }}'>
    @if(request()->routeIs('mrshaze'))
    <div id="mrshaze"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    @elseif(request()->routeIs('login'))
    @livewireStyles()
    @stack('styles')
        {{ $slot }}
    @livewireScripts()
    @stack('scripts')
    @else
    @livewireStyles()
    @stack('styles')
    <div class="flex h-screen overflow-hidden rounded-lg">
        @include('layouts.sidebar')
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="p-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @livewireScripts()
    @stack('scripts')
    @endif
</body>
</html>