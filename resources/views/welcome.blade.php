@extends('layouts.app')
@section('content')
    <div class="hero bg-base-200 my-auto">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">{{ __('content.welcome.title') }} 🦖</h1>
                <p class="py-6">{{ __('content.welcome.subtitle') }}<br>
                    {{ __('content.welcome.text') }}</p>
                <button class="btn btn-primary"><a href="{{ route('login') }}">{{ __('content.welcome.button') }}</a></button>
            </div>
        </div>
    </div>
@endsection
