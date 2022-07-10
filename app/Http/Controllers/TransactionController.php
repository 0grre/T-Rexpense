<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        (New Transaction())->StoreUpdateValidator($request);

        return redirect()->back()->with('success','Transaction created with success');
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
        return redirect()->back()->with('success','Transaction updated with success');
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
}
