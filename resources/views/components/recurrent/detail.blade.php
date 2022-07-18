<div class="card-body">
@foreach($recurrents as $recurrent)
    <div class="flex justify-between">
        <!-- Open update modal -->
        <label for="update-recurrent-modal-{{$recurrent->id}}" class="cursor-pointer">
            {{ $recurrent->name . ' '}}
            <span class="@if($recurrent->category->is_expense == 0) text-success @else text-error @endif">
            {{  number_format($recurrent->amount, 2)}}
        </span>
            €
        </label>
        <!-- Open new recurrent transaction modal -->
        @if( !$recurrent->is_paid() )
            <div class="tooltip hover:tooltip-open tooltip-left" data-tip="Store this transaction for this month">
                <label for="new-recurrent-transaction-modal-{{ $recurrent->id }}">
                    <span class="cursor-pointer material-symbols-outlined">
                        currency_exchange
                    </span>
                </label>
            </div>
        @endif
        <!-- Recurrent transaction modal -->
        <input type="checkbox" id="new-recurrent-transaction-modal-{{ $recurrent->id }}" class="modal-toggle"/>
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-8">New transaction</h3>
                <label for="new-recurrent-transaction-modal-{{ $recurrent->id }}"
                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Recurrent Id -->
                        <input type="hidden" name="recurrent_id" value="{{ $recurrent->id }}">
                        <!-- Name -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">Enter name</span>
                            </label>
                            <label class="input-group">
                                <input name="name" type="text" placeholder="transaction name here"
                                       value="{{ $recurrent->name }}"
                                       class="input input-bordered input-primary w-full max-w-xs" required/>
                            </label>
                        </div>
                        <!-- Amount -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">Enter amount</span>
                            </label>
                            <label class="input-group">
                                <input name="amount" type="number" step='0.01' placeholder="{{ number_format($recurrent->amount, 2) }}" class="input input-bordered"
                                       value="{{ number_format($recurrent->amount, 2) }}" required/>
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
                                <input name="paid_at" type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
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
                                            @if($category->id == $recurrent->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-action">
                        <button class="btn btn-outline btn-success">Create transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update modal tag -->
    <input type="checkbox" id="update-recurrent-modal-{{$recurrent->id}}" class="modal-toggle"/>
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-8">Update recurrent transaction</h3>
            <label for="update-recurrent-modal-{{$recurrent->id}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <form method="POST" action="{{ 'recurrents/'. $recurrent->id }}">
                @method('put')
                @csrf
                <div class="flex flex-col gap-4">
                    <!-- Name -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Enter name</span>
                        </label>
                        <label class="input-group">
                            <input name="name" type="text" placeholder="{{ $recurrent->name }}"
                                   value="{{ $recurrent->name }}"
                                   class="input input-bordered input-primary w-full max-w-xs" required/>
                        </label>
                    </div>
                    <!-- Amount -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Enter amount</span>
                        </label>
                        <label class="input-group">
                            <input name="amount" type="number" step='0.01' placeholder="{{ number_format($recurrent->amount, 2) }}"
                                   value="{{ number_format($recurrent->amount, 2) }}" class="input input-bordered" required/>
                            <span class="material-symbols-outlined">
                            euro
                        </span>
                        </label>
                    </div>
                    <!-- Category -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Select recurrent transaction category</span>
                        </label>
                        <select name="category_id" class="select select-bordered select-primary w-full max-w-xs"
                                required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id == $recurrent->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-action">
                    <!-- Open delete modal -->
                    <label for="delete-recurrent-modal-{{$recurrent->id}}" class="btn btn-outline btn-error btn-sm">Delete</label>
                    <button class="btn btn-outline btn-success btn-sm">Update</button>
                </div>
            </form>
            <!-- Delete modal -->
            <input type="checkbox" id="delete-recurrent-modal-{{$recurrent->id}}" class="modal-toggle"/>
            <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form method="POST" action="{{ 'recurrents/'. $recurrent->id }}">
                        @method('delete')
                        @csrf
                        <h3 class="font-bold text-lg">Delete recurrent?</h3>
                        <p class="py-4">Are you sure you want to remove the recurrent? It will be deleted
                            permanently!</p>
                        <div class="modal-action">
                            <label for="delete-recurrent-modal-{{$recurrent->id}}"
                                   class="btn btn-outline btn-error btn-sm">Cancel</label>
                            <button class="btn btn-error btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
