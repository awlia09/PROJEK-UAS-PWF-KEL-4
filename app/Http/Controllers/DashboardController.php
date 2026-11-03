<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total peminjaman yang terlambat (lewat jatuh tempo & belum dikembalikan)
        $totalTerlambat = Borrowing::whereNull('returned_at')
            ->where('due_date', '<', Carbon::now())
            ->count();

        // 2. Buku dengan stok menipis (misal stok <= 3)
        $bukuStokMenipis = Book::where('stock', '<=', 3)->get();

        // 3. 5 transaksi peminjaman terbaru
        $peminjamanTerbaru = Borrowing::with(['member', 'book'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('totalTerlambat', 'bukuStokMenipis', 'peminjamanTerbaru'));
    }
}