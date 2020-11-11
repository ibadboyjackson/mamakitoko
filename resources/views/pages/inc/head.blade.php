<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <!--  Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>@yield('title')</title>
    <!-- JavaScript -->
    <style>
        .page-item.active .page-link {
            z-index: 0;
            color: #fff;
            background-color: #101010 !important;
            border-color: #101010 !important;
            margin-bottom: 50px!important;
        }
    </style>
</head>
<body>
