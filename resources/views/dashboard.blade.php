<x-app-layout>
    <x-slot name="slot">
        <div>
            @if (session('success'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            @error('name')
            <div class="alert alert-error shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ $message }}</span>
                </div>
            </div>
            @enderror
        </div>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="link link-primary mx-2">Logout</button>
            </form>
        @endif
        </div>
        <div class="py-12">
            <div class="m-8 p-4 w-64 outline outline-primary rounded-lg flex flex-col gap-2">
                <h3 class="card-title">Recurrent transactions</h3>
                <x-recurrent.detail :recurrents="$recurrents" :categories="$categories"/>
                <x-recurrent.form :categories="$categories"/>
            </div>

            <div class="m-8 p-4 w-64 outline outline-primary rounded-lg flex flex-col gap-2">
                <h3 class="card-title">Transactions</h3>
                <x-transaction.detail :transactions="$transactions" :categories="$categories"/>
                <x-transaction.form :categories="$categories"/>
            </div>

            <div class="m-8 p-4 w-64 outline outline-primary rounded-lg flex flex-col gap-2">
                <h3 class="card-title">Budgets</h3>
                <x-budget.detail :budgets="$budgets" :categories="$categories"/>
                <x-budget.form :categories="$categories"/>
            </div>

            <div class="m-8 p-4 w-64 outline outline-primary rounded-lg flex flex-col gap-2">
                <h3 class="card-title">Categories</h3>
                <x-category.detail :categories="$categories"/>
                <x-category.form/>
            </div>
        </div>
    </x-slot>
</x-app-layout>
