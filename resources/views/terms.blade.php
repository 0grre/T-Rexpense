@extends('layouts.app')
@section('content')
    <div class="hero bg-base-200">
        <div class="hero-content my-12">
            <div>
                @if(App::getLocale() == 'fr')
                    @include('components.terms.fr')
                @else
                    @include('components.terms.en')
                @endif
            </div>
        </div>
    </div>
@endsection
