<div>
    <h1>Dashboard Perpustakaan</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>

    <hr>

    <!-- Ringkasan / Kartu Statistik -->
    <div>
        <h3>Ringkasan Status</h3>
        <p><strong>Total Peminjaman Terlambat:</strong> {{ $totalTerlambat }} Transaksi</p>
    </div>

    <hr>

    <!-- Daftar Buku Stok Menipis -->
    <div>
        <h3>Buku Stok Menipis (Stok &le; 3)</h3>
        @if($bukuStokMenipis->isEmpty())
            <p>Semua stok buku masih mencukupi.</p>
        @else
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Sisa Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukuStokMenipis as $buku)
                        <tr>
                            <td>{{ $buku->title }}</td>
                            <td>{{ $buku->author }}</td>
                            <td>{{ $buku->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <hr>

    <!-- 5 Peminjaman Terbaru -->
    <div>
        <h3>5 Peminjaman Terbaru</h3>
        @if($peminjamanTerbaru->isEmpty())
            <p>Belum ada transaksi peminjaman.</p>
        @else
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tgl Harus Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanTerbaru as $borrowing)
                        <tr>
                            <td>{{ $borrowing->member->name ?? '-' }}</td>
                            <td>{{ $borrowing->book->title ?? '-' }}</td>
                            <td>{{ $borrowing->borrowed_at }}</td>
                            <td>{{ $borrowing->due_date }}</td>
                            <td>
                                @if($borrowing->returned_at)
                                    Sudah Dikembalikan
                                @elseif(\Carbon\Carbon::parse($borrowing->due_date)->isPast())
                                    TERLAMBAT
                                @else
                                    Dipinjam
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>