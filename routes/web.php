<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Route milik Tania
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store', 'show']);
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');

    // Route milik Tasya
    // Admin dan petugas: lihat kategori, kelola buku
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::resource('books', BookController::class);
    });

    // Hanya admin: tambah, ubah, hapus kategori
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    });
});