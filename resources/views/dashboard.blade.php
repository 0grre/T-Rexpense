@extends('layouts.app')
@section('content')
    <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-center py-24 px-8 mx-auto">

        <div class="grid grid-cols-1 gap-4 place-content-stretch ml-auto mr-0 min-w-full">
            <div class="card flex flex-col justify-between p-4 outline outline-primary rounded-lg">
                <div class="collapse collapse-plus">
                    <input type="checkbox" checked/>
                    <h3 class="collapse-title card-title">{{ __('content.dashboard.transactions') }}</h3>
                    <div class="collapse-content">
                        <x-transaction.detail :transactions="$transactions" :categories="$categories"/>
                    </div>
                </div>
                <x-transaction.form :categories="$categories"/>
            </div>

            <div class="card flex flex-col justify-between p-4 outline outline-primary rounded-lg">
                <div class="collapse collapse-plus">
                    <input type="checkbox" checked/>
                    <h3 class="collapse-title card-title">{{ __('content.dashboard.recurrent-transactions') }}</h3>
                    <div class="collapse-content">
                        <x-recurrent.detail :recurrents="$recurrents" :categories="$categories"/>
                    </div>
                </div>
                <x-recurrent.form :categories="$categories"/>
            </div>
        </div>

        <div class="card p-4 outline outline-primary rounded-lg w-auto row-start-1 md:col-start-2">
            <x-total.actual :budgets="$budgets" :totals="$totals"/>
        </div>

        <div class="grid grid-cols-1 gap-4 place-content-stretch mx-auto ml-0 min-w-full">
            <div class="card flex flex-col justify-between p-4 outline outline-primary rounded-lg">
                <div class="collapse collapse-plus">
                    <input type="checkbox" checked/>
                    <h3 class="collapse-title card-title">{{ __('content.dashboard.budgets') }}</h3>
                    <div class="collapse-content">
                        <x-budget.detail :budgets="$budgets" :categories="$categories"/>
                    </div>
                </div>
                <x-budget.form :categories="$categories"/>
            </div>

            <div class="card flex flex-col justify-between p-4 outline outline-primary rounded-lg">
                <div class="collapse collapse-plus">
                    <input type="checkbox" checked/>
                    <h3 class="collapse-title card-title">{{ __('content.dashboard.categories') }}</h3>
                    <div class="collapse-content">
                        <x-category.detail :categories="$categories"/>
                    </div>
                </div>
                <x-category.form/>
            </div>
        </div>
    </div>
    @if (session('success'))
        <x-alert.success />
    @endif
    @error('name')
        <x-alert.error :message="$message"/>
    @enderror
    {{--            <div class="m-8 p-4 w-1/2 outline outline-primary rounded-lg flex flex-col gap-2">--}}
    {{--                <x-chart.bar :test="$chart_data"/>--}}
    {{--            </div>--}}
@endsection
