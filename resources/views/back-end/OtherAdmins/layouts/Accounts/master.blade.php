<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Accounts') }}</title>
    @section('title','Admin')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom-staffgen.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/uniform.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    {{-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" /> --}}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('back-end.OtherAdmins.layouts.Accounts.header')
    @include('back-end.OtherAdmins.layouts.Accounts.nav')

    <!--main-container-part-->
    <div id="content">
        @yield('content')
    </div>
    @include('back-end.OtherAdmins.layouts.Accounts.footer')
    @yield('jsblock')
</body>
</html>

