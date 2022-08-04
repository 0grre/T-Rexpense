<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RecurrentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::get('theme/{theme}', [Controller::class, 'switchTheme'])->name('theme.switch');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');

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
