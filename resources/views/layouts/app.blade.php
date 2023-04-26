<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/3efd97e294.js" crossorigin="anonymous"></script>
    <!-- 4/16追記 -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- 4/3追記 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/hobbystic.css') }}" rel="stylesheet">
    <!-- 4/3追記 -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

    <!-- 4/21追記：header_icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        <main class="py-4 mb-5">
            @yield('content')
        </main>

        @component('components.footer')
        @endcomponent
    </div>

    <!-- <script src="js/header.js"></script> -->
    @yield('js')
</body>
</html>
