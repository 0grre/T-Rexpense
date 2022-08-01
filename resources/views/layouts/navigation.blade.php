@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/logout') }}" class="link link-primary mx-2">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="link link-primary mx-2">{{ __('auth.login.slug') }}</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="link link-primary mx-2">{{ __('auth.register.slug') }}</a>
            @endif
        @endauth

        <label class="text-xl mx-2">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                @endif
            @endforeach
        </label>
        <label class="swap  swap-rotate text-xl mx-2">

            <input id="lang" type="checkbox"/>

            <div class="swap-on">☀️</div>
            <div class="swap-off">🌙</div>
        </label>
    </div>
@endif
