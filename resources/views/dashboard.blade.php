@extends('layouts.app')

@section('content')
<h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
<p>Anda login sebagai {{ ucfirst(auth()->user()->role) }}</p>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3"><div class="card-body">
            <h5>Total Judul Buku</h5><h2>{{ $totalTitles }}</h2>
        </div></div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3"><div class="card-body">
            <h5>Total Stok Buku</h5><h2>{{ $totalStock }}</h2>
        </div></div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3"><div class="card-body">
            <h5>Total Anggota</h5><h2>{{ $totalMembers }}</h2>
        </div></div>
    </div>
    <div class="col-md-3">
        <div class="card text-dark bg-warning mb-3"><div class="card-body">
            <h5>Sedang Dipinjam</h5><h2>{{ $borrowedCount }}</h2>
        </div></div>
    </div>
</div>

<div class="card text-white bg-danger mb-4" style="max-width: 18rem;">
    <div class="card-body">
        <h5>Terlambat</h5><h2>{{ $totalTerlambat }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h5>Stok Menipis (kurang dari 3)</h5>
        <table class="table table-sm table-bordered bg-white">
            <tr><th>Judul</th><th>Stok</th></tr>
            @forelse($bukuStokMenipis as $buku)
                <tr><td>{{ $buku->title }}</td><td>{{ $buku->stock }}</td></tr>
            @empty
                <tr><td colspan="2">Semua stok masih mencukupi.</td></tr>
            @endforelse
        </table>
    </div>

    <div class="col-md-6">
        <h5>Peminjaman Terbaru</h5>
        <table class="table table-sm table-bordered bg-white">
            <tr><th>Anggota</th><th>Buku</th><th>Jatuh Tempo</th><th>Status</th></tr>
            @forelse($peminjamanTerbaru as $b)
                <tr>
                    <td>{{ $b->member->nama ?? '-' }}</td>
                    <td>{{ $b->details->map(fn($d) => $d->book->title ?? '-')->implode(', ') }}</td>
                    <td>{{ $b->batas_pinjam->format('d-m-Y') }}</td>
                    <td>
                        @if($b->status === 'returned')
                            Dikembalikan
                        @elseif($b->batas_pinjam->lt(today()))
                            <span class="text-danger fw-bold">Terlambat</span>
                        @else
                            Dipinjam
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada peminjaman.</td></tr>
            @endforelse
        </table>
    </div>
</div>
@endsection