<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'categories' => Category::all()
        ]);
    })->name('dashboard');
    Route::resource('/expenses', CategoryController::class);
//    Route::resource('/categories', ExpenseController::class);
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

Route::get('/test', function () {
    return User::all();
});
require __DIR__.'/auth.php';
