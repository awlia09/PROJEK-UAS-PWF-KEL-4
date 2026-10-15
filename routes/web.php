<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use app\Http\Controllers\BorrowingController;

// Tania //
Route::get('/members', [MemberController::class, 'index']);
Route::get('/borrowings', [BorrowingController::class, 'index']);

// tasya //
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);