<!-- The button to open modal -->
<label for="new-recurrent-modal" class="btn btn-outline btn-primary btn-xs">New recurrent transaction</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-recurrent-modal" class="modal-toggle"/>
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">New recurrent transaction</h3>
        <label for="new-recurrent-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('recurrents.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <!-- Name -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Enter name</span>
                    </label>
                    <label class="input-group">
                        <input name="name" type="text" placeholder="Recurrent transaction name here"
                               class="input input-bordered input-primary w-full max-w-xs" required/>
                    </label>
                </div>
                <!-- Amount -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Enter amount</span>
                    </label>
                    <label class="input-group">
                        <input name="amount" type="text" placeholder="0.01" class="input input-bordered" required/>
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
                    <select name="category_id" class="select select-bordered select-primary w-full max-w-xs" required>
                        <option disabled selected>Pick recurrent transaction category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn btn-outline btn-success">Create recurrent transaction</button>
            </div>
        </form>
    </div>
</div>

