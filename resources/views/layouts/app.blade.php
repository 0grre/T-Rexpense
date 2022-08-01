<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="black">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ config('app.name', 'T-Rexpense') }}</title>
    <link rel="icon" href="./T-Rexpense.ico" type="image/icon type">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
        src="https://tarteaucitron.io/load.js?domain=t-rexpense.xyz&uuid=50af414d8dc8237d1bd9760cc838fe9d6f095630"></script>

    @include('components.tarteaucitron')
</head>
    <body>
    @include('layouts.navigation')
    <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    @include('layouts.footer')
    </body>
</html>
