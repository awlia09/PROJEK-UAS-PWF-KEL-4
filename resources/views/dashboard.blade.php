@extends('layouts.app')

@section('title', 'Dashboard - Perpustakaan')

@section('content')
    <div class="page-intro">
        <h2 class="page-title-lg">Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p class="page-subtitle">Anda login sebagai {{ ucfirst(auth()->user()->role) }}</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card bg-pastel-blue">
            <div class="stat-title">Total Judul Buku</div>
            <div class="stat-value">{{ $totalJudulBuku }}</div>
        </div>

        <div class="stat-card bg-pastel-purple">
            <div class="stat-title">Total Stok Buku</div>
            <div class="stat-value">{{ $totalStokBuku }}</div>
        </div>

        <div class="stat-card bg-pastel-pink">
            <div class="stat-title">Total Anggota</div>
            <div class="stat-value">{{ $totalAnggota }}</div>
        </div>

        <div class="stat-card bg-pastel-yellow">
            <div class="stat-title">Sedang Dipinjam</div>
            <div class="stat-value">{{ $totalSedangDipinjam }}</div>
        </div>

        <div class="stat-card bg-pastel-red">
            <div class="stat-title">Terlambat</div>
            <div class="stat-value">{{ $totalTerlambat }}</div>
        </div>
    </div>

    <div class="dashboard-tables-grid">
        <div class="card">
            <h3 class="section-title">Stok Menipis (kurang dari 3)</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th class="col-center">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bukuStokMenipis as $buku)
                            <tr>
                                <td>{{ $buku->title }}</td>
                                <td class="col-center"><span class="badge badge-stok">{{ $buku->stock }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="table-empty">Semua stok buku masih mencukupi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <h3 class="section-title">Peminjaman Terbaru</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamanTerbaru as $b)
                            <tr>
                                <td>{{ $b->member->nama ?? '-' }}</td>
                                <td>{{ $b->details->map(fn ($d) => $d->book->title ?? '-')->implode(', ') }}</td>
                                <td>{{ $b->batas_pinjam->format('d-m-Y') }}</td>
                                <td>
                                    @if($b->status === 'returned')
                                        <span class="badge badge-blue">Dikembalikan</span>
                                    @elseif($b->isTerlambat())
                                        <span class="badge badge-red">Terlambat</span>
                                    @else
                                        <span class="badge badge-yellow">Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="table-empty">Belum ada transaksi peminjaman.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection