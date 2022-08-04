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
