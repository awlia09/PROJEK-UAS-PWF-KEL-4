<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use app\Http\Controllers\BorrowingController;

// Tania //
Route::resource('members', MemberController::class);
Route::resource('borrowings', BorrowingController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
    ->name('borrowings.return');

// tasya //
Route::get('/categories', [CategoryController::class, 'index']);
Route::resource('books', BookController::class);