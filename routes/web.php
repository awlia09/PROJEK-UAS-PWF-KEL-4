<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// aul autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// halaman wajib login
Route::middleware('auth')->group(function () {

    //aul dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //aul manajemen user (admin)
    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });

    //tania member and borrowing
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store', 'show']);
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');

    //tasya buku (admin dan petugas) + kategori 
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::resource('books', BookController::class);
    });

    //tasya kategori, tambah/ubah/hapus (khusus admin) 
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    });
});