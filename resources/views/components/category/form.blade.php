<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>

    <div class="block mt-4">
        <label for="is_income" class="inline-flex items-center">
            <input id="is_income" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_income">
            <span class="ml-2 text-sm text-gray-600">{{ __('Income ?') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">

        <x-button class="ml-4">
            {{ __('New category') }}
        </x-button>
    </div>
</form>
