@extends('layouts.app')
@section('content')
    <div class="hero bg-base-200">
        <div class="hero-content my-12">
            <div>
                @if(App::getLocale() == 'fr')
                    @include('components.privacy.fr')
                @else
                    @include('components.privacy.en')
                @endif
            </div>
        </div>
    </div>
@endsection
