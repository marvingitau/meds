<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Staff Dashboard') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    @yield('cssblock')




    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('back-end.Staff.layouts.header')
    @include('back-end.Staff.layouts.nav')

    <!--main-container-part-->
    <div id="content">
        <div class="client-content">
            @yield('content')

        </div>
    </div>
    @include('back-end.Staff.layouts.footer')
    @yield('jsblock')
</body>
</html>

