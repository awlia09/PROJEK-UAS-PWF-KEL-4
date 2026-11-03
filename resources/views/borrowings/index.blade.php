@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Data Peminjaman</h2>
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
                    @forelse($borrowings as $b)
                        <tr>
                            <td>{{ $b->member->nama ?? '-' }}</td>
                            <td>{{ $b->user->name ?? '-' }}</td>
                            <td>{{ $b->borrowed_at }}</td>
                            <td>{{ $b->due_date }}</td>
                            <td>{{ $b->returned_at ?? '-' }}</td>
                            <td>{{ $b->book->judul ?? '-' }}</td>
                            <td><span class="badge-status">{{ ucfirst($b->status) }}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('borrowings.edit', $b->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('borrowings.destroy', $b->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus data peminjaman?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" style="text-align: center;">Belum ada data peminjaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection