<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/common.css')}}"/>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        @stack('home_index_styles')
        @stack('message_index_styles')
        @stack('search_index_styles')
        @stack('follow_store_styles')
        @stack('mypage_index_styles')
        @stack('calendar_plan_styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js'])
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
        @stack('home_index_script')
        @stack('message_index_script')
        @stack('search_index_script')
        @stack('follow_script')
        @stack('follow_script')
        @stack('calendar_plan_script')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
                       <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="pageContent">
                {{ $slot }}
            </main>
        </div>
        @include('posts/index')
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBsRQ9rwuxYfog7dKcppeigJfT2zddWo5c&callback=initMap&libraries=places" async defer></script>        
    </body>
</html>
