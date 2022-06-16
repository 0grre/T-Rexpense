<x-app-layout>
    <x-slot name="slot">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-category.form/>
                        <div>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <details>
                                            <summary>{{ $category->name }}</summary>
                                            <x-category.detail :category="$category"/>
                                            <x-delete-button :route="'categories/' . $category->id"/>
                                        </details>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-expense.form :categories="$categories"/>
                        <div>
                            <ul>
                                @foreach($expenses as $expense)
                                    <li>
                                        <details>
                                            <summary>{{ $expense->name }}</summary>
                                            <x-expense.detail :expense="$expense" :categories="$categories"/>
                                            <x-delete-button :route="'expenses/' . $expense->id"/>
                                        </details>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>


</x-app-layout>
