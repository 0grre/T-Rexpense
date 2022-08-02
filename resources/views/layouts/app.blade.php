<!DOCTYPE html>
<html id="test" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">
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
    <script src="https://tarteaucitron.io/load.js?domain=t-rexpense.xyz&uuid=50af414d8dc8237d1bd9760cc838fe9d6f095630"></script>
{{--    @include('components.tarteaucitron')--}}
</head>
<body>
<main class="flex flex-col justify-between h-full min-h-screen @if(Request::path() != 'dashboard') bg-base-200 @endif">
    <div class="drawer drawer-end">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle"/>
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="w-full navbar">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                    </label>
                </div>
                <div class="flex-1">
                    {{-- dark/light mode --}}
                    <a href="" class="mx-2 mt-0.5">
                        <span class="material-symbols-outlined">
                            dark_mode
                        </span>
                    </a>
                </div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        @auth
                            @if(Request::path() != 'dashboard')
                                <li class="text-secondary hover:text-white">
                                    <a href="{{ url('/dashboard') }}">dashboard</a>
                                </li>
                            @endif
                            <li class="text-secondary hover:text-white">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button>{{ __('auth.logout') }}</button>
                                </form>
                            </li>
                        @else
                            @if(Request::path() != '/')
                                <li class="text-secondary hover:text-white">
                                    <a href="/">{{ __('auth.back') }}</a>
                                </li>
                            @endif
                            @if(Request::path() != 'login')
                                <li class="text-secondary hover:text-white">
                                    <a href="{{ route('login') }}">{{ __('auth.login.slug') }}</a>
                                </li>
                            @endif
                            @if(Request::path() != 'register')
                                <li class="text-secondary hover:text-white">
                                    <a href="{{ route('register') }}">{{ __('auth.register.slug') }}</a>
                                </li>
                            @endif
                        @endauth
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}" class="mt-0.5">{{ $language }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="flex-none lg:hidden">
                    <ul class="menu menu-horizontal">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}" class="mx-2 mt-0.5">{{ $language }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Page Content -->
            <button onclick="truc()">salut</button>
            @yield('content')
            @include('layouts.footer')
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100">
                @auth
                    @if(Request::path() != 'dashboard')
                        <li class="text-secondary hover:text-white">
                            <a href="{{ url('/dashboard') }}" class="link link-primary mx-2">dashboard</a>
                        </li>
                    @endif
                    <li class="text-secondary hover:text-white">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="link link-primary mx-2">{{ __('auth.logout') }}</button>
                        </form>
                    </li>
                @else
                    @if(Request::path() != '/')
                        <li class="text-secondary hover:text-white">
                            <a href="/" class="link link-primary mx-2">{{ __('auth.back') }}</a>
                        </li>
                    @endif
                    @if(Request::path() != 'login')
                        <li>
                            <a href="{{ route('login') }}"
                               class="link link-primary mx-2">{{ __('auth.login.slug') }}</a>
                        </li>
                    @endif
                    @if(Request::path() != 'register')
                        <li class="text-secondary hover:text-white">
                            <a href="{{ route('register') }}"
                               class="link link-primary mx-2">{{ __('auth.register.slug') }}</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</main>
</body>
    <script type="text/javascript">
        let mod = document.getElementById('test')
        const truc = () => {
            mod.dataset.theme === 'corporate' ? mod.setAttribute("data-theme", "dark") : mod.setAttribute("data-theme", "corporate");
            console.log(mod.dataset.theme)
        };
    </script>
</html>
