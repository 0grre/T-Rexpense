<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ExpenseController extends Controller
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
            'amount' => 'required|decimal|min:0.01',
            'date' => 'required|date',
            'category_id' => 'required|integer',
        ])->validate();

        $expense = new Expense();
        $expense->name = $request->name;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->is_recurrent = $request->is_recurrent ? 1 : 0;
        $expense->category_id = $request->category_id;
        $expense->user_id = Auth::id();

        $expense->save();
        return redirect()->back()->with('success','expense created with success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Expense $expense
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Expense $expense): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
            'amount' => 'required|decimal|min:0.01',
            'date' => 'required|date',
            'category_id' => 'required|integer',
        ])->validate();

        $expense = Expense::find($expense);
        $expense->name = $request->name;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->is_recurrent = $request->is_recurrent ? 1 : 0;
        $expense->category_id = $request->category_id;
        $expense->user_id = Auth::id();

        $expense->save();
        return redirect()->back()->with('success','expense created with success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
