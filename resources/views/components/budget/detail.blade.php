<div class="card-body">
    @foreach($budgets as $budget)
        <!-- Open update modal -->
        <label for="update-budget-modal-{{$budget->id}}"
               class="cursor-pointer">&rsaquo; {{ $budget->name . ' ' . number_format($budget->amount, 2) . ' €' }}</label>

        <!-- Update modal tag -->
        <input type="checkbox" id="update-budget-modal-{{$budget->id}}" class="modal-toggle"/>
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-8">{{ __('content.budget.update') }}</h3>
                <label for="update-budget-modal-{{$budget->id}}"
                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <form method="POST" action="{{ 'budgets/'. $budget->id }}">
                    @method('put')
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Name -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">{{ __('form.field.name') }}</span>
                            </label>
                            <label class="input-group">
                                <input name="name" type="text" placeholder="{{ $budget->name }}"
                                       value="{{ $budget->name }}"
                                       class="input input-bordered input-primary w-full max-w-xs" required/>
                            </label>
                        </div>
                        <!-- Amount -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">{{ __('form.field.amount') }}</span>
                            </label>
                            <label class="input-group">
                                <input name="amount" type="number" step='0.01'
                                       placeholder="{{ number_format($budget->amount, 2) }}"
                                       value="{{ number_format($budget->amount, 2) }}" class="input input-bordered"
                                       required/>
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
                            <select name="category_id" class="select select-bordered select-primary w-full max-w-xs"
                                    required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($category->id == $budget->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-action">
                        <!-- Open delete modal -->
                        <label for="delete-budget-modal-{{$budget->id}}"
                               class="btn btn-outline btn-error btn-sm">{{ __('form.delete') }}</label>
                        <button class="btn btn-outline btn-success btn-sm">{{ __('form.update') }}</button>
                    </div>
                </form>
                <!-- Delete modal -->
                <input type="checkbox" id="delete-budget-modal-{{$budget->id}}" class="modal-toggle"/>
                <div class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <form method="POST" action="{{ 'budgets/'. $budget->id }}">
                            @method('delete')
                            @csrf
                            <h3 class="font-bold text-lg">{{ __('content.budget.delete') }}</h3>
                            <p class="py-4">{{ __('form.delete-text') }}</p>
                            <div class="modal-action">
                                <label for="delete-budget-modal-{{$budget->id}}"
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
