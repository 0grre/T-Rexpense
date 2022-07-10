<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BudgetController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        (New Budget())->StoreUpdateValidator($request);

        return redirect()->back()->with('success','Budget created with success');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Budget::find($id)->StoreUpdateValidator($request, $id);
        return redirect()->back()->with('success','Budget updated with success');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Budget::destroy($id);
        return redirect()->back()->with('success', 'Budget deleted with success');
    }
}
