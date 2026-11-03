@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h2 class="page-title" style="font-size: 1.8rem; margin-bottom: 0.2rem;">
            Selamat Datang, {{ auth()->user()?->name ?? 'Admin Utama' }}!
        </h2>
        <p style="color: var(--text-muted); font-size: 1rem;">
            Anda login sebagai {{ ucfirst(auth()->user()?->role ?? 'Admin') }}
        </p>
    </div>

    <!-- 5 Kartu Statistik Dinamis Palette Pastel -->
    <div class="stats-grid">
        <div class="stat-card bg-pastel-blue">
            <div class="stat-title">Total Judul Buku</div>
            <div class="stat-value">{{ $totalJudulBuku ?? $totalBuku ?? 0 }}</div>
        </div>

        <div class="stat-card bg-pastel-purple">
            <div class="stat-title">Total Stok Buku</div>
            <div class="stat-value">{{ $totalStokBuku ?? $totalStok ?? 0 }}</div>
        </div>

        <div class="stat-card bg-pastel-pink">
            <div class="stat-title">Total Anggota</div>
            <div class="stat-value">{{ $totalAnggota ?? 0 }}</div>
        </div>

        <div class="stat-card bg-pastel-yellow">
            <div class="stat-title">Sedang Dipinjam</div>
            <div class="stat-value">{{ $totalSedangDipinjam ?? 0 }}</div>
        </div>

        <div class="stat-card bg-pastel-red">
            <div class="stat-title">Terlambat</div>
            <div class="stat-value">{{ $totalTerlambat ?? 0 }}</div>
        </div>
    </div>

    <!-- Layout 2 Tabel Berdampingan -->
    <div class="dashboard-tables-grid">
        <!-- Kolom Kiri: Stok Menipis -->
        <div class="card" style="margin-bottom: 0;">
            <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1.25rem; color: var(--text-dark);">
                Stok Menipis (kurang dari 3)
            </h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th style="width: 100px; text-align: center;">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bukuStokMenipis ?? [] as $buku)
                            <tr>
                                <td>{{ $buku->judul ?? $buku->title ?? '-' }}</td>
                                <td style="text-align: center;">
                                    <span class="badge-stok">{{ $buku->stok ?? $buku->stock ?? 0 }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align: center; color: var(--text-muted); padding: 1.5rem 0;">
                                    Tidak ada stok buku yang menipis.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Kolom Kanan: Peminjaman Terbaru (Dikosongkan) -->
        <div class="card" style="margin-bottom: 0;">
            <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1.25rem; color: var(--text-dark);">
                Peminjaman Terbaru
            </h3>
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
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 2rem 1rem;">
                                Belum ada transaksi peminjaman terbaru.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection