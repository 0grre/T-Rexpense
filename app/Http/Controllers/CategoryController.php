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
        self::CategoryValidator($request);
        return redirect()->back()->with('success', 'category created with success');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        self::CategoryValidator($request, $id);
        return redirect()->back()->with('success', 'category updated with success');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Category::destroy($id);
        return redirect()->back()->with('success', 'category deleted with success');
    }

    /**
     * @throws ValidationException
     */
    public function CategoryValidator(Request $request, $id = null)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
        ])->validate();

        $category = $id ? Category::find($id) : new Category();
        $category->name = $request->name;
        $category->is_income = $request->is_income ? 1 : 0;
        $category->user_id = Auth::id();
        $category->save();
    }
}
