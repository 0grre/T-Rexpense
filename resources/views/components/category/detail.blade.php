


<form method="POST" action="{{ 'categories/'. $category->id }}">
    @method('put')
    @csrf

    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" :placeholder="$category->name" required/>
    </div>

    @error('name')
        <div class="text-red-600">
            {{ $message }}
        </div>
    @enderror

    <div class="block mt-4">
        <label for="is_income" class="inline-flex items-center">
            <input id="is_income" type="checkbox" name="is_income" @if($category->is_income == 1) checked @endif class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <span class="ml-2 text-sm text-gray-600">{{ __('Income ?') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">

        <x-button class="ml-4">
            {{ __('update category') }}
        </x-button>
    </div>

    @if (session('success'))
        <div class="text-green-600">
            {{ session('success') }}
        </div>
    @endif
</form>
