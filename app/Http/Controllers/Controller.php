<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Category;
use App\Models\Recurrent;
use App\Models\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('dashboard', [
            'categories' => Category::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('name')->get(),
            'transactions' => TransactionResource::collection(Transaction::where('user_id', Auth::user()->getAuthIdentifier())->get()),
            'recurrents' => TransactionResource::collection(Recurrent::where('user_id', Auth::user()->getAuthIdentifier())->get()),
            'budgets' => TransactionResource::collection((new BudgetController)->get_actual_amount()),
            'totals' => TransactionController::getTotalMonthlyAmounts(),
            'chart_data' => json_encode([0, 10, 5, 2, 20, 30, 45]),
        ]);
    }

    /**
     * @param $theme
     * @return RedirectResponse
     */
    public function switchTheme($theme): RedirectResponse
    {
        if (array_key_exists($theme, Config::get('themes'))) {
            Session::put('theme', $theme);
        }
        return Redirect::back();
    }
}
