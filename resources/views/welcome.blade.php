<x-app-layout>
    <x-slot name="slot">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="link link-primary mx-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="link link-primary mx-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="link link-primary mx-2">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Hello there! 🦖</h1>
                    <p class="py-6">Welcome to T-Rexpense!<br> This web application allows you to manage your expenses and income for the month.</p>
                    <button class="btn btn-primary"><a href="{{ route('login') }}">Get Started</a></button>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
