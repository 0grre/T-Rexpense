<?php

namespace App\Http\Controllers;

use App\Models\Recurrent;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        (new Transaction())->StoreUpdateValidator($request);

        return redirect()->back()->with('success', 'Transaction created with success');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Transaction::find($id)->StoreUpdateValidator($request, $id);
        return redirect()->back()->with('success', 'Transaction updated with success');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Transaction::destroy($id);
        return redirect()->back()->with('success', 'Transaction deleted with success');
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'actual' => "mixed",
        'final' => "mixed"
    ])]
    public static function getTotalMonthlyAmounts(): array
    {
        $incomes = Transaction::where('user_id', Auth::user()->getAuthIdentifier())->get()->reject(function ($expense) {
            return $expense->is_expense();
        })->sum('amount');

        $expenses = Transaction::where('user_id', Auth::user()->getAuthIdentifier())->get()->filter(function ($expense) {
            return $expense->is_expense();
        })->sum('amount');

        $actual_total = $incomes - $expenses;

        $recurrent_expenses_not_paid = Recurrent::where('user_id', Auth::user()->getAuthIdentifier())->get()->filter(function ($recurrent) {
            return $recurrent->is_expense() && !$recurrent->is_paid();
        })->sum('amount');

        return [
            'actual' => $actual_total,
            'final' => $actual_total - $recurrent_expenses_not_paid
        ];
    }
}
