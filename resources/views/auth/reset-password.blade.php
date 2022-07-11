<x-guest-layout>
    <div>
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
    </div>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{ url('/') }}" class="link link-primary mx-2">Back</a>
        @if (Route::has('register'))
            <a href="{{ route('login') }}" class="link link-primary mx-2">Login</a>
        @endif
    </div>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Reset Password! 🦖</h1>
                <p class="py-6">Need to reset your password?<br>
                    Use your secret code!</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Email Address -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">{{ __('Email') }}</span>
                            </label>
                            <input type="text" placeholder="email" name="email" value="{{ old('email', $request->email) }}"
                                   class="input input-bordered" required/>
                        </div>
                        <!-- Password -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">{{ __('Password') }}</span>
                            </label>
                            <input placeholder="password" type="password" name="password" class="input input-bordered"
                                   required/>
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">{{ __('Confirm Password') }}</span>
                            </label>
                            <input placeholder="password confirmation" type="password" name="password_confirmation"
                                   class="input input-bordered"
                                   required/>
                        </div>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
