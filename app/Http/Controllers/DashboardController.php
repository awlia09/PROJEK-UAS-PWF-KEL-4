<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        // Kartu statistik wajib
        $totalJudulBuku      = Book::count();
        $totalStokBuku       = (int) Book::sum('stock');
        $totalAnggota        = Member::count();
        $totalSedangDipinjam = Borrowing::where('status', 'borrowed')->count();

        // Dashboard tambahan
        $totalTerlambat = Borrowing::where('status', 'borrowed')
            ->whereDate('batas_pinjam', '<', today())
            ->count();

        $bukuStokMenipis = Book::where('stock', '<', 3)
            ->orderBy('stock')
            ->orderBy('title')
            ->take(5)
            ->get();

        $peminjamanTerbaru = Borrowing::with(['member', 'details.book'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalJudulBuku',
            'totalStokBuku',
            'totalAnggota',
            'totalSedangDipinjam',
            'totalTerlambat',
            'bukuStokMenipis',
            'peminjamanTerbaru'
        ));
    }
}