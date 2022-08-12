<!-- The button to open modal -->
<label for="new-transaction-modal"
       class="btn btn-outline btn-primary btn-xs">{{ __('content.transaction.title') }}</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-transaction-modal" class="modal-toggle"/>
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">{{ __('content.transaction.title') }}</h3>
        <label for="new-transaction-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <!-- Name -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.name') }}</span>
                    </label>
                    <label class="input-group">
                        <input name="name" type="text" placeholder="{{ __('form.placeholder.name') }}"
                               class="input input-bordered input-primary w-full max-w-xs" required/>
                    </label>
                </div>
                <!-- Amount -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.amount') }}</span>
                    </label>
                    <label class="input-group">
                        <input name="amount" type="number" step='0.01' placeholder="0.00" class="input input-bordered"
                               required/>
                        <span class="material-symbols-outlined">
                            euro
                        </span>
                    </label>
                </div>
                <!-- Paid Date -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.paid-date') }}</span>
                    </label>
                    <label class="input-group">
                        <input name="paid_at" type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                               class="input input-bordered" required/>
                    </label>
                </div>
                <!-- Category -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">{{ __('form.field.category') }}</span>
                    </label>
                    <select name="category_id" class="select select-bordered select-primary w-full max-w-xs">
                        <option disabled selected>{{ __('form.field.pick-category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn btn-outline btn-success">{{ __('content.transaction.create') }}</button>
            </div>
        </form>
    </div>
</div>

