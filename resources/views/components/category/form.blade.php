<!-- The button to open modal -->
<label for="new-category-modal" class="btn btn-outline btn-primary btn-xs">{{ __('content.transaction.title') }}</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-category-modal" class="modal-toggle"/>
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">{{ __('content.transaction.title') }}</h3>
        <label for="new-category-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <!-- Name -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.name') }}</span>
                    </label>
                    <input name="name" type="text" placeholder="{{ __('form.placeholder.name') }}"
                           class="input input-bordered input-primary w-full max-w-xs" required/>
                </div>
                <!-- Is Expense -->
                <div class="form-control w-full max-w-xs">
                    <label class="label cursor-pointer">
                        <span class="label-text">{{ __('form.is-expense') }}</span>
                        <input type="checkbox" name="is_expense" checked="checked"
                               class="checkbox checkbox-primary checkbox-sm"/>
                    </label>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn btn-outline btn-success">{{ __('content.category.create') }}</button>
            </div>
        </form>
    </div>
</div>

