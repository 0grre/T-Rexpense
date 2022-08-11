<!DOCTYPE html>
<html id="html" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{Session::get('theme')}}">
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
{{--    <script src="https://tarteaucitron.io/load.js?domain=t-rexpense.xyz&uuid=50af414d8dc8237d1bd9760cc838fe9d6f095630">--}}
{{--    </script>--}}
{{--    <script src="https://cookiehub.net/c2/c6bd5d6a.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        document.addEventListener("DOMContentLoaded", function(event) {--}}
{{--            var cpm = {};--}}
{{--            window.cookiehub.load(cpm);--}}
{{--        });--}}
{{--    </script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<main class="@if(Request::path() != 'dashboard') bg-base-200 @endif">
    <div class="drawer drawer-end">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle"/>
        <div class="drawer-content flex flex-col">
            <!-- Desktop Navbar -->
            <div class="w-full navbar absolute">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                    </label>
                </div>
                <!-- dark/light mod -->
                @include('components.theme')
                <!-- Navbar -->
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        @include('auth.navigation')
                        @include('components.language')
                    </ul>
                </div>
                <div class="flex-none lg:hidden">
                    <ul class="menu menu-horizontal">
                        @include('components.language')
                    </ul>
                </div>
            </div>
            <!-- Page Content -->
            <div class="flex flex-col justify-between min-h-full min-h-screen pt-12">
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
        <!-- Mobile Navbar -->
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100">
                @include('auth.navigation')
            </ul>
        </div>
    </div>
</main>
</body>
</html>
