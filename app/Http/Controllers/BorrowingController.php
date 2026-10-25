<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BorrowingController extends Controller
{
    // Daftar peminjaman
    public function index() {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    // Form peminjaman baru
    public function create() {
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    // Simpan peminjaman
    public function store(Request $request) {
        $data = $request->validate([
            'member_id'          => ['required', 'exists:members,id'],
            'tanggal_peminjaman' => ['required', 'date'],
            'books'              => ['required', 'array', 'min:1'],
            'books.*'            => ['exists:books,id'],
        ]);

        DB::transaction(function () use ($data) {
            $tanggalPinjam = Carbon::parse($data['tanggal_peminjaman']);

            $borrowing = Borrowing::create([
                'user_id'            => 1, // SEMENTARA, ganti ke Auth::id() setelah P14
                'member_id'          => $data['member_id'],
                'tanggal_peminjaman' => $tanggalPinjam,
                'batas_pinjam'       => $tanggalPinjam->copy()->addWeek(),
                'status'             => 'borrowed',
            ]);

            foreach ($data['books'] as $bookId) {
                $book = Book::lockForUpdate()->findOrFail($bookId);

                if ($book->stock < 1) {
                    throw ValidationException::withMessages([
                        'books' => "Stok buku {$book->title} habis.",
                    ]);
                }

                $borrowing->details()->create([
                    'book_id'   => $book->id,
                    'kuantitas' => 1,
                ]);

                $book->decrement('stock');
            }
        });

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman dicatat.');
    }

    // Detail peminjaman
    public function show(Borrowing $borrowing) {
        $borrowing->load(['member', 'user', 'details.book']);

        return view('borrowings.show', compact('borrowing'));
    }

    // Pengembalian buku
    public function returnBook(Borrowing $borrowing) {
        if ($borrowing->status === 'returned') {
            return back()->with('error', 'Peminjaman ini sudah dikembalikan.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'tanggal_pengembalian' => now()->toDateString(),
                'status'               => 'returned',
            ]);

            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->kuantitas);
            }
        });

        return redirect()->route('borrowings.index')->with('success', 'Buku dikembalikan.');
    }
}