<!-- The button to open modal -->
<label for="new-category-modal" class="btn btn-outline btn-primary btn-xs">New category</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="new-category-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-8">New category</h3>
        <label for="new-category-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Enter name</span>
                    </label>
                    <input name="name" type="text" placeholder="Category name here" class="input input-bordered input-primary w-full max-w-xs"/>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label cursor-pointer">
                        <span class="label-text">Is expense?</span>
                        <input type="checkbox" name="is_expense" checked="checked" class="checkbox checkbox-primary checkbox-sm"/>
                    </label>
                </div>
            </div>

            <div class="modal-action">
                <button class="btn btn-outline btn-success">Create category</button>
            </div>
        </form>
    </div>
</div>

