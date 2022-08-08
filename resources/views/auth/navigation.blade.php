@auth
    @if(Request::path() != 'dashboard')
        <li class="text-secondary hover:text-white">
            <a href="{{ url('/dashboard') }}" class="mx-2">dashboard</a>
        </li>
    @endif
    <li class="text-secondary hover:text-white">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="mx-2">{{ __('auth.logout') }}</button>
        </form>
    </li>
@else
    @if(Request::path() != '/')
        <li class="text-secondary hover:text-white">
            <a href="/" class="mx-2">{{ __('auth.back') }}</a>
        </li>
    @endif
    @if(Request::path() != 'login')
        <li class="text-secondary hover:text-white">
            <a href="{{ route('login') }}"
               class="mx-2">{{ __('auth.login.slug') }}</a>
        </li>
    @endif
    @if(Request::path() != 'register')
        <li class="text-secondary hover:text-white">
            <a href="{{ route('register') }}"
               class="mx-2">{{ __('auth.register.slug') }}</a>
        </li>
    @endif
@endauth
