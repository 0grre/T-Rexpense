<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'categories' => Category::all(),
            'expenses' => Expense::all()
        ]);
    })->name('dashboard');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
});

Route::get('/test', function () {
    return User::all();
});
require __DIR__.'/auth.php';
