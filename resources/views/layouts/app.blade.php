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
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}"/>
    <meta property="article:author" content="https://www.facebook.com/subani" />
    <meta property="article:publisher" content="https://www.facebook.com/moktan.subani" />
    <meta property="og:url" content="{{ strtolower(request()->url()) }}" />
    <meta name="twitter:url" content="{{ strtolower(request()->url()) }}" />
    <meta name="twitter:site" content="@moktansubani" />
    <meta name="robots" content="index, follow"/>
    @stack('meta_tags')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class='{{ request()->routeIs('admin*') ? 'bg-gray-100' : 'bodyView' }}'>
    @if(request()->routeIs('admin*'))
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
    @else
        @livewireStyles()
        @stack('styles')
            {{ $slot }}
        @livewireScripts()
        @stack('scripts')
    @endif
</body>
</html>