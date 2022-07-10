<?php

namespace App\Http\Controllers;

use App\Models\Recurrent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RecurrentController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        (New Recurrent())->StoreUpdateValidator($request);

        return redirect()->back()->with('success','Recurrent created with success');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Recurrent::find($id)->StoreUpdateValidator($request, $id);
        return redirect()->back()->with('success','Recurrent updated with success');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Recurrent::destroy($id);
        return redirect()->back()->with('success', 'Recurrent deleted with success');
    }
}
