<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alṕine@v2.x.x/dis/alpine.min.js" defer></script>
        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-family: Open Sans, sans-serif bg-pink-100">
        <x-jet-banner />

            @livewire('navigation-menu')

            <!-- Page Heading -->
        <section class="px-6 py-8">
        @if (isset($header))
            {{ $header }}
        @endif

            <!-- Page Content -->
{{--            <main class="max-w-6xl mx-auto mt-6 space-y-6">--}}
            <main>
                {{ $slot }}
            </main>

        @stack('modals')

        @livewireScripts
    @if (isset($footer))
    {{ $footer }}
    @endif
    </body>
    <x-flash></x-flash>

</html>
