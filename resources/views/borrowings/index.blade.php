@extends('layouts.app')

@section('title', 'Data Peminjaman - Perpustakaan')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title">Data Peminjaman</h2>
            <a href="{{ route('borrowings.create') }}" class="btn btn-tambah">+ Peminjaman Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Anggota</th>
                        <th>Petugas</th>
                        <th>Tgl Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Tgl Kembali</th>
                        <th>Buku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->member->nama ?? '-' }}</td>
                            <td>{{ $borrowing->user->name ?? '-' }}</td>
                            <td>{{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</td>
                            <td>{{ $borrowing->batas_pinjam->format('d-m-Y') }}</td>
                            <td>{{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : '-' }}</td>
                            <td>{{ $borrowing->details->map(fn ($d) => $d->book->title ?? '-')->implode(', ') }}</td>
                            <td>
                                @if($borrowing->status === 'returned')
                                    <span class="badge badge-blue">Dikembalikan</span>
                                @elseif($borrowing->isTerlambat())
                                    <span class="badge badge-red">Terlambat {{ $borrowing->hariTerlambat() }} hari</span>
                                @else
                                    <span class="badge badge-yellow">Dipinjam</span>
                                @endif
                            </td>
                            <td class="col-actions">
                                <div class="btn-group">
                                    <a href="{{ route('borrowings.show', $borrowing) }}" class="btn btn-info btn-sm">Detail</a>

                                    @if($borrowing->status === 'borrowed')
                                        <form action="{{ route('borrowings.return', $borrowing) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-simpan btn-sm" onclick="return confirm('Tandai buku sudah dikembalikan?')">Kembalikan</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="table-empty">Belum ada data peminjaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection