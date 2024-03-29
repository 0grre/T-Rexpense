<div class="card-body">
    @foreach($categories as $category)
        <!-- Open update modal -->
        <label for="update-category-modal-{{$category->id}}"
               class="cursor-pointer @if($category->is_expense == 0) text-success @else text-error @endif">
            &rsaquo; {{ $category->name }}</label>

        <!-- Update modal tag -->
        <input type="checkbox" id="update-category-modal-{{$category->id}}" class="modal-toggle"/>
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-8">{{ __('content.category.update') }}</h3>
                <label for="update-category-modal-{{$category->id}}"
                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <form method="POST" action="{{ 'categories/'. $category->id }}">
                    @method('put')
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Name -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">{{ __('form.field.name') }}</span>
                            </label>
                            <label class="input-group">
                                <input name="name" type="text" placeholder="{{ $category->name }}"
                                       value="{{ $category->name }}"
                                       class="input input-bordered input-primary w-full max-w-xs" required/>
                            </label>
                        </div>
                        <!-- Is Expense -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label cursor-pointer">
                                <span class="label-text">{{ __('form.is-expense') }}</span>
                                <input type="checkbox" name="is_expense"
                                       @checked(old(1, $category->is_expense))  class="checkbox checkbox-primary checkbox-sm"/>
                            </label>
                        </div>
                    </div>
                    <div class="modal-action">
                        <!-- Open delete modal -->
                        <label for="delete-category-modal-{{$category->id}}"
                               class="btn btn-outline btn-error btn-sm">{{ __('form.delete') }}</label>
                        <button class="btn btn-outline btn-success btn-sm">{{ __('form.update') }}</button>
                    </div>
                </form>
                <!-- Delete modal -->
                <input type="checkbox" id="delete-category-modal-{{$category->id}}" class="modal-toggle"/>
                <div class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <form method="POST" action="{{ 'categories/'. $category->id }}">
                            @method('delete')
                            @csrf
                            <h3 class="font-bold text-lg">{{ __('content.category.delete') }}</h3>
                            <p class="py-4">{{ __('form.delete-text') }}</p>
                            <div class="modal-action">
                                <label for="delete-category-modal-{{$category->id}}"
                                       class="btn btn-outline btn-error btn-sm">{{ __('form.cancel') }}</label>
                                <button class="btn btn-error btn-sm">{{ __('form.delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
