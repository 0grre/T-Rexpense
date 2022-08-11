<!-- The button to open modal -->
<label for="new-budget-modal" class="btn btn-outline btn-primary btn-xs">{{ __('content.budget.title') }}</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-budget-modal" class="modal-toggle"/>
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">{{ __('content.budget.title') }}</h3>
        <label for="new-budget-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('budgets.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <!-- Name -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.name') }}</span>
                    </label>
                    <label class="input-group">
                        <input name="name" type="text" placeholder="Budget name here"
                               class="input input-bordered input-primary w-full max-w-xs" required/>
                    </label>
                </div>
                <!-- Amount -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.amount') }}</span>
                    </label>
                    <label class="input-group">
                        <input name="amount" type="number" step='0.01' placeholder="0.00" class="input input-bordered" required/>
                        <span class="material-symbols-outlined">
                            euro
                        </span>
                    </label>
                </div>
                <!-- Category -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.category') }}</span>
                    </label>
                    <select name="category_id" class="select select-bordered select-primary w-full max-w-xs" required>
                        <option disabled selected>{{ __('form.field.pick-category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn btn-outline btn-success">{{ __('form.budget.create') }}</button>
            </div>
        </form>
    </div>
</div>

