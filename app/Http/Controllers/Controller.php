<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('dashboard', [
            'categories' => Category::where('user_id', Auth::id())->get(),
            'expenses' => Expense::where('user_id', Auth::id())->get()
        ]);
    }

    public function CheckAndCreateRecurrentExpense()
    {
        $recurrent_expenses = Expense::where('is_recurrent', 1)->where('user_id', Auth::id())->get();

        foreach($recurrent_expenses as $expense){

            return date('m', strtotime($expense->date));
        }
    }
}
