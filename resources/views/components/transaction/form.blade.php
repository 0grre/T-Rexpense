<!-- The button to open modal -->
<label for="new-transaction-modal" class="btn btn-outline btn-primary btn-xs">New transaction</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-transaction-modal" class="modal-toggle"/>
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">New transaction</h3>
        <label for="new-transaction-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <!-- Name -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Enter name</span>
                    </label>
                    <label class="input-group">
                        <input name="name" type="text" placeholder="transaction name here"
                               class="input input-bordered input-primary w-full max-w-xs" required/>
                    </label>
                </div>
                <!-- Amount -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Enter amount</span>
                    </label>
                    <label class="input-group">
                        <input name="amount" type="number" step='0.01' placeholder="0.00" class="input input-bordered" required/>
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
                        <input name="paid_at" type="date" class="input input-bordered" required/>
                    </label>
                </div>
                <!-- Category -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Select transaction category</span>
                    </label>
                    <select name="category_id" class="select select-bordered select-primary w-full max-w-xs">
                        <option disabled selected>Pick transaction category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
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

