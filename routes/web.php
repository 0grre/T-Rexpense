<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecurrentController;
use App\Http\Controllers\TransactionController;
use App\Http\Resources\TransactionResource;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Recurrent;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'categories' => Category::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('name')->get(),
            'transactions' => TransactionResource::collection(Transaction::where('user_id', Auth::user()->getAuthIdentifier())->get()),
            'recurrents' => TransactionResource::collection(Recurrent::where('user_id', Auth::user()->getAuthIdentifier())->get()),
            'budgets' => TransactionResource::collection(Budget::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('name')->get()),
            'totals' => TransactionController::getTotalMonthlyAmounts(),
            'chart_data' => json_encode([0, 10, 5, 2, 20, 30, 45])
        ]);
    })->name('dashboard');


    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    Route::post('/recurrents', [RecurrentController::class, 'store'])->name('recurrents.store');
    Route::put('/recurrents/{id}', [RecurrentController::class, 'update'])->name('recurrents.update');
    Route::delete('/recurrents/{id}', [RecurrentController::class, 'destroy'])->name('recurrents.destroy');

    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::put('/budgets/{id}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{id}', [BudgetController::class, 'destroy'])->name('budgets.destroy');
});

Route::get('/test', function () {

});
require __DIR__.'/auth.php';
