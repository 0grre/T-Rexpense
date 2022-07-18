<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * @return mixed
     */
    public function get_actual_amount(): mixed
    {
        $budgets = Budget::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('name')->get();

        foreach ($budgets as $budget){
            $expenses = Transaction::where('user_id', Auth::user()->getAuthIdentifier())->where('category_id', $budget->category_id)->get()->filter(function ($expense) {
                return $expense->is_expense();
            })->sum('amount');

            $budget->actual_amount = $budget->amount - $expenses;
        }

        return $budgets;
    }
}
