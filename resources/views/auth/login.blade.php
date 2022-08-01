@extends('layouts.app')
@section('content')
        @if (session('status'))
            <div class="alert alert-warning shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-error shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $error }}</span>
                    </div>
                </div>
            @endforeach
        @endif
    <div class="hero bg-base-200 my-auto">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">{{ __('auth.login.title') }} 🦖</h1>
                <p class="py-6">{{ __('auth.login.subtitle') }}<br>{{ __('auth.login.text') }}</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text first-letter:capitalize">{{ __('form.email') }}</span>
                            </label>
                            <input type="text" placeholder="{{ __('form.email') }}" name="email" value="{{ old('email') }}"
                                   class="input input-bordered" required/>
                        </div>
                        <!-- Password -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text first-letter:capitalize">{{ __('form.password') }}</span>
                            </label>
                            <input placeholder="{{ __('form.password') }}" type="password" name="password" class="input input-bordered"
                                   required/>
                            @if (Route::has('password.request'))
                                <label class="label">
                                    <a href="{{ route('password.request') }}"
                                       class="label-text-alt link link-hover">{{ __('passwords.forgot.title') }}</a>
                                </label>
                            @endif
                        </div>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary first-letter:capitalize">{{ __('auth.login.title') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
