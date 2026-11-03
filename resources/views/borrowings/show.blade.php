@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 650px; margin: 0 auto;">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Detail Peminjaman</h2>
            <span class="badge-stok" style="background-color: var(--pastel-purple);">
                {{ ucfirst($borrowing->status) }}
            </span>
        </div>

        <div style="line-height: 2.2; font-size: 0.95rem; margin-top: 0.5rem;">
            <div style="display: flex; border-bottom: 1px solid var(--border-color); padding: 0.5rem 0;">
                <strong style="width: 180px;">Nama Anggota:</strong>
                <span>{{ $borrowing->member->nama ?? $borrowing->member->name ?? '-' }}</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid var(--border-color); padding: 0.5rem 0;">
                <strong style="width: 180px;">Petugas / User:</strong>
                <span>{{ $borrowing->user->name ?? '-' }}</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid var(--border-color); padding: 0.5rem 0;">
                <strong style="width: 180px;">Buku yang Dipinjam:</strong>
                <span>{{ $borrowing->book->judul ?? $borrowing->book->title ?? '-' }}</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid var(--border-color); padding: 0.5rem 0;">
                <strong style="width: 180px;">Tanggal Peminjaman:</strong>
                <span>{{ $borrowing->borrowed_at }}</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid var(--border-color); padding: 0.5rem 0;">
                <strong style="width: 180px;">Jatuh Tempo:</strong>
                <span>{{ $borrowing->due_date ?? '-' }}</span>
            </div>

            <div style="display: flex; padding: 0.5rem 0;">
                <strong style="width: 180px;">Tanggal Pengembalian:</strong>
                <span>{{ $borrowing->returned_at ?? 'Belum Dikembalikan' }}</span>
            </div>
        </div>

        <div class="btn-group" style="margin-top: 1.8rem;">
            <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-edit">Edit Peminjaman</a>
            <a href="{{ route('borrowings.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>
@endsection