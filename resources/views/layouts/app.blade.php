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
        @stack('home_index_styles')
        @stack('message_index_styles')
        @stack('search_index_styles')
        @stack('follow_store_styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js'])
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        @stack('home_index_script')
        @stack('message_index_script')
        @stack('search_index_script')
        @stack('follow_script')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main class="pageContent">
                {{ $slot }}
            </main>
        </div>
        <!--投稿-->
        @include('posts/index')
    </body>
</html>
