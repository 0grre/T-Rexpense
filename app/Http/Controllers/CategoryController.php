<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
        ])->validate();

        $category = new Category();
        $category->name = $request->name;
        $category->is_income = $request->is_income ? 1 : 0;
        $category->user_id = Auth::id();

        $category->save();
        return redirect()->back()->with('success','category created with success');
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
        ])->validate();

        $category = Category::find($category);
        $category->name = $request->name;
        $category->is_income = $request->is_income ? 1 : 0;
        $category->save();
        return redirect()->back()->with('success','category updated with success');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category = Category::find($category);
        $category->destroy();
        return redirect()->back()->with('success', 'category deleted with success');
    }
}
