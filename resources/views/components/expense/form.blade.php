<form method="POST" action="{{ route('expenses.store') }}">
    @csrf
    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
    </div>

    <div class="block mt-4">
        <label for="category_id" class="block font-medium text-sm text-gray-700"> Category</label>
        <select id="category_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-label for="amount" :value="__('Amount')" />

        <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required/>
    </div>

    <div>
        <x-label for="date" :value="__('Date')" />

        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required/>
    </div>

    <div class="block mt-4">
        <label for="is_recurrent" class="inline-flex items-center">
            <input id="is_recurrent" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_recurrent">
            <span class="ml-2 text-sm text-gray-600">{{ __('Recurrent ?') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">

        <x-button class="ml-4">
            {{ __('New expense') }}
        </x-button>
    </div>
</form>
