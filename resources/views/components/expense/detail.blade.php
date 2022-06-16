


<form method="POST" action="{{ 'expenses/'. $expense->id }}">
    @method('put')
    @csrf

    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$expense->name" :placeholder="$expense->name" required/>
    </div>

    @error('name')
    <div class="text-red-600">
        {{ $message }}
    </div>
    @enderror

    <div class="block mt-4">
        <label for="category_id" class="block font-medium text-sm text-gray-700">Category</label>
        <select id="category_id" name="category_id"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    @error('category_id')
    <div class="text-red-600">
        {{ $message }}
    </div>
    @enderror

    <div>
        <x-label for="amount" :value="__('Amount')"/>

        <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="$expense->amount" :placeholder="$expense->amount" required/>
    </div>
    @error('amount')
    <div class="text-red-600">
        {{ $message }}
    </div>
    @enderror

    <div>
        <x-label for="date" :value="__('Date')"/>

        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="$expense->date" required/>
    </div>

    @error('date')
    <div class="text-red-600">
        {{ $message }}
    </div>
    @enderror

    <div class="block mt-4">
        <label for="is_recurrent" class="inline-flex items-center">
            <input id="is_recurrent" type="checkbox" name="is_recurrent" @if($expense->recurrent_id) checked @endif class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <span class="ml-2 text-sm text-gray-600">{{ __('Recurrent ?') }}</span>
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
