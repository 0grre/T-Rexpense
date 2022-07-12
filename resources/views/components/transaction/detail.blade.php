@foreach($transactions as $transaction)
    <!-- Open update modal -->
    <label for="update-transaction-modal-{{$transaction->id}}" class="cursor-pointer">
        {{ $transaction->name }}
        <span class="@if($transaction->category->is_expense == 0) text-success @else text-error @endif">
            {{ $transaction->amount }}
            </span>
        €
        <span class="text-xs text-secondary"> {{ date('d-m', strtotime($transaction->paid_at)) }}</span>
    </label>
    <!-- Update modal tag -->
    <input type="checkbox" id="update-transaction-modal-{{$transaction->id}}" class="modal-toggle"/>
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-8">Update transaction</h3>
            <label for="update-transaction-modal-{{$transaction->id}}"
                   class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <form method="POST" action="{{ 'transactions/'. $transaction->id }}">
                @method('put')
                @csrf
                <div class="flex flex-col gap-4">
                    <!-- Name -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Enter name</span>
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
                            <span class="label-text">Enter amount</span>
                        </label>
                        <label class="input-group">
                            <input name="amount" type="text" placeholder="{{ $transaction->amount }}"
                                   value="{{ $transaction->amount }}" class="input input-bordered" required/>
                            <span class="material-symbols-outlined">
                            euro
                        </span>
                        </label>
                    </div>
                    <!-- Paid Date -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Enter paid date</span>
                        </label>
                        <label class="input-group">
                            <input name="paid_at" type="date" value="{{ $transaction->paid_at }}"
                                   class="input input-bordered" required/>
                        </label>
                    </div>
                    <!-- Category -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Select transaction category</span>
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
                    <label for="delete-transaction-modal-{{$transaction->id}}" class="btn btn-outline btn-error btn-sm">Delete</label>
                    <button class="btn btn-outline btn-success btn-sm">Update</button>
                </div>
            </form>
            <!-- Delete modal -->
            <input type="checkbox" id="delete-transaction-modal-{{$transaction->id}}" class="modal-toggle"/>
            <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form method="POST" action="{{ 'transactions/'. $transaction->id }}">
                        @method('delete')
                        @csrf
                        <h3 class="font-bold text-lg">Delete transaction?</h3>
                        <p class="py-4">Are you sure you want to remove the transaction? It will be deleted
                            permanently!</p>
                        <div class="modal-action">
                            <label for="delete-transaction-modal-{{$transaction->id}}"
                                   class="btn btn-outline btn-error btn-sm">Cancel</label>
                            <button class="btn btn-error btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
