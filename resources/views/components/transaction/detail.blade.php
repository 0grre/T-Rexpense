<div class="card-body">
    @foreach($transactions as $transaction)
        <!-- Open update modal -->
        <label for="update-transaction-modal-{{$transaction->id}}" class="cursor-pointer">
            {{ $transaction->name }}
            <span class="@if($transaction->category->is_expense == 0) text-success @else text-error @endif">
            {{ number_format($transaction->amount, 2) }}
            </span>
            €
            <span class="text-xs text-secondary"> {{ date('d-m', strtotime($transaction->paid_at)) }}</span>
        </label>
        <!-- Update modal tag -->
        <input type="checkbox" id="update-transaction-modal-{{$transaction->id}}" class="modal-toggle"/>
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-8">{{ __('content.transaction.update') }}</h3>
                <label for="update-transaction-modal-{{$transaction->id}}"
                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <form method="POST" action="{{ 'transactions/'. $transaction->id }}">
                    @method('put')
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Name -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">{{ __('form.field.name') }}</span>
                            </label>
                            <label class="input-group">
                                <input name="name" type="text" placeholder="{{ $transaction->name }}"
                                       value="{{ $transaction->name }}"
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
                                       placeholder="{{ number_format($transaction->amount, 2) }}"
                                       value="{{ number_format($transaction->amount, 2) }}" class="input input-bordered"
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
                                <input name="paid_at" type="date" value="{{ $transaction->paid_at }}"
                                       class="input input-bordered" required/>
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
                                            @if($category->id == $transaction->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-action">
                        <!-- Open delete modal -->
                        <label for="delete-transaction-modal-{{$transaction->id}}"
                               class="btn btn-outline btn-error btn-sm">{{ __('form.delete') }}</label>
                        <button class="btn btn-outline btn-success btn-sm">{{ __('form.update') }}</button>
                    </div>
                </form>
                <!-- Delete modal -->
                <input type="checkbox" id="delete-transaction-modal-{{$transaction->id}}" class="modal-toggle"/>
                <div class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <form method="POST" action="{{ 'transactions/'. $transaction->id }}">
                            @method('delete')
                            @csrf
                            <h3 class="font-bold text-lg">{{ __('content.transaction.delete') }}</h3>
                            <p class="py-4">{{ __('form.delete-text') }}</p>
                            <div class="modal-action">
                                <label for="delete-transaction-modal-{{$transaction->id}}"
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
