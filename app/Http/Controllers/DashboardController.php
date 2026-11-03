<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total jenis/judul buku
        $totalJudulBuku = Book::count();

        // 2. Hitung total akumulasi seluruh stok buku (cek kolom 'stok' / 'stock')
        $totalStokBuku = Book::sum('stok') ?: Book::sum('stock');

        // 3. Hitung total anggota
        $totalAnggota = Member::count();

        // 4. Hitung peminjaman yang sedang aktif / terlambat
        $totalSedangDipinjam = Borrowing::whereIn('status', ['dipinjam', 'borrowed'])->count();
        $totalTerlambat = Borrowing::where('status', 'terlambat')->count();

        // 5. Ambil daftar buku yang stoknya kurang dari atau sama dengan 3
        $bukuStokMenipis = Book::where('stok', '<=', 3)
            ->orWhere('stock', '<=', 3)
            ->get();

        return view('dashboard', compact(
            'totalJudulBuku',
            'totalStokBuku',
            'totalAnggota',
            'totalSedangDipinjam',
            'totalTerlambat',
            'bukuStokMenipis'
        ));
    }
}