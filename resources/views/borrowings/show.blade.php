@extends('layouts.app')

@section('title', 'Detail Peminjaman - Perpustakaan')

@section('content')
    <div class="card detail-card">
        <div class="card-header-custom">
            <h2 class="page-title">Detail Peminjaman</h2>

            @if($borrowing->status === 'returned')
                <span class="badge badge-blue">Dikembalikan</span>
            @elseif($borrowing->isTerlambat())
                <span class="badge badge-red">Terlambat {{ $borrowing->hariTerlambat() }} hari</span>
            @else
                <span class="badge badge-yellow">Dipinjam</span>
            @endif
        </div>

        <dl class="detail-list">
            <dt>Nama Anggota</dt>
            <dd>{{ $borrowing->member->nama ?? '-' }}</dd>

            <dt>Petugas</dt>
            <dd>{{ $borrowing->user->name ?? '-' }}</dd>

            <dt>Buku yang Dipinjam</dt>
            <dd>
                <ul>
                    @foreach($borrowing->details as $detail)
                        <li>{{ $detail->book->title ?? '-' }} ({{ $detail->kuantitas }})</li>
                    @endforeach
                </ul>
            </dd>

            <dt>Tanggal Peminjaman</dt>
            <dd>{{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</dd>

            <dt>Jatuh Tempo</dt>
            <dd>{{ $borrowing->batas_pinjam->format('d-m-Y') }}</dd>

            <dt>Tanggal Pengembalian</dt>
            <dd>{{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : 'Belum dikembalikan' }}</dd>
        </dl>

        <div class="form-actions">
            @if($borrowing->status === 'borrowed')
                <form action="{{ route('borrowings.return', $borrowing) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-simpan" onclick="return confirm('Tandai buku sudah dikembalikan?')">Kembalikan Buku</button>
                </form>
            @endif
            <a href="{{ route('borrowings.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>
@endsection