<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalTitles' => class_exists(Book::class) ? Book::count() : 0,
            'totalStock' => class_exists(Book::class) ? Book::sum('stock') : 0,
            'totalMembers' => class_exists(Member::class) ? Member::count() : 0,
            'borrowedCount' => class_exists(Borrowing::class) ? Borrowing::where('status', 'borrowed')->count() : 0,
        ]);
    }
}