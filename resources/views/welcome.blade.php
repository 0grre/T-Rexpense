<x-app-layout>
    <x-slot name="slot">
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
