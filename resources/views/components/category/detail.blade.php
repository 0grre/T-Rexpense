<div class="card-body">
    @foreach($categories as $category)
        <!-- Open update modal -->
        <label for="update-category-modal-{{$category->id}}"
               class="cursor-pointer @if($category->is_expense == 0) text-success @else text-error @endif">
            &rsaquo; {{ $category->name }}</label>

        <!-- Update modal tag -->
        <input type="checkbox" id="update-category-modal-{{$category->id}}" class="modal-toggle"/>
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-8">Update category</h3>
                <label for="update-category-modal-{{$category->id}}"
                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <form method="POST" action="{{ 'categories/'. $category->id }}">
                    @method('put')
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Name -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">Enter name</span>
                            </label>
                            <input name="name" type="text" placeholder="{{ $category->name }}"
                                   value="{{ $category->name }}"
                                   class="input input-ghost w-full max-w-xs" required/>
                        </div>
                        <!-- Is Expense -->
                        <div class="form-control w-full max-w-xs">
                            <label class="label cursor-pointer">
                                <span class="label-text">Is expense?</span>
                                <input type="checkbox" name="is_expense"
                                       @checked(old(1, $category->is_expense))  class="checkbox checkbox-primary checkbox-sm"/>
                            </label>
                        </div>
                    </div>
                    <div class="modal-action">
                        <!-- Open delete modal -->
                        <label for="delete-category-modal-{{$category->id}}"
                               class="btn btn-outline btn-error btn-sm">Delete</label>
                        <button class="btn btn-outline btn-success btn-sm">Update</button>
                    </div>
                </form>
                <!-- Delete modal -->
                <input type="checkbox" id="delete-category-modal-{{$category->id}}" class="modal-toggle"/>
                <div class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <form method="POST" action="{{ 'categories/'. $category->id }}">
                            @method('delete')
                            @csrf
                            <h3 class="font-bold text-lg">Delete category?</h3>
                            <p class="py-4">Are you sure you want to delete the category? Any expenses or income related
                                to
                                this category will also be permanently removed!</p>
                            <div class="modal-action">
                                <label for="delete-category-modal-{{$category->id}}"
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
