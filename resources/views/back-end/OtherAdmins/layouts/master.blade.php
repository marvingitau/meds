<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Warehouse Manager') }}</title>
    @section('title','Admin')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
      {{-- <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" /> --}}
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('public/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/custom-staffgen.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    {{-- <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset('public/css/jquery.gritter.css')}}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('back-end.OtherAdmins.layouts.header')
    @include('back-end.OtherAdmins.layouts.nav')

    <!--main-container-part-->
    <div id="content">
        @yield('content')
    </div>
    @include('back-end.OtherAdmins.layouts.footer')
    @yield('jsblock')
</body>
</html>

