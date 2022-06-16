<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Recurrent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ExpenseController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        self::ExpenseValidator($request);
        return redirect()->back()->with('success','expense created with success');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        self::ExpenseValidator($request, $id);
        return redirect()->back()->with('success','expense updated with success');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Expense::destroy($id);
        return redirect()->back()->with('success', 'expense deleted with success');
    }

    /**
     * @throws ValidationException
     */
    public function ExpenseValidator(Request $request, $id = null)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'category_id' => 'required|integer',
        ])->validate();

        $expense = $id ? Expense::find($id) : new Expense();
        $expense->name = $request->name;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->category_id = $request->category_id;
        $expense->user_id = Auth::id();

        if (!$expense->recurrent_id) {
            if ($request->is_recurrent) {
                $recurrent = new Recurrent();
                $recurrent->save();
                $expense->recurrent_id = $recurrent->id;
            }
        } else {
            if (!$request->is_recurrent) {
                $old_reccurent_id = $expense->recurrent_id;
                Recurrent::destroy($old_reccurent_id);
                $expense->recurrent_id = null;
                Recurrent::destroy($old_reccurent_id);
            }

        }

        $expense->save();
    }
}
