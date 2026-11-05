@extends('layouts.app')

@section('title', 'Detail Anggota - Perpustakaan')

@section('content')
    <div class="card detail-card">
        <h2 class="page-title">Detail Anggota</h2>

        <dl class="detail-list">
            <dt>Kode Member</dt>
            <dd>{{ $member->kode_member }}</dd>

            <dt>Nama</dt>
            <dd>{{ $member->nama }}</dd>

            <dt>Email</dt>
            <dd>{{ $member->email }}</dd>

            <dt>No HP</dt>
            <dd>{{ $member->nomor_hp ?: '-' }}</dd>

            <dt>Jenis Kelamin</dt>
            <dd>{{ $member->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>

            <dt>Tanggal Daftar</dt>
            <dd>{{ $member->tanggal_daftar->format('d-m-Y') }}</dd>
        </dl>

        <div class="form-actions">
            <a href="{{ route('members.edit', $member) }}" class="btn btn-edit">Edit</a>
            <a href="{{ route('members.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>

    <div class="card">
        <h3 class="section-title">Riwayat Peminjaman</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tgl Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Tgl Kembali</th>
                        <th>Buku</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($member->borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</td>
                            <td>{{ $borrowing->batas_pinjam->format('d-m-Y') }}</td>
                            <td>{{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : '-' }}</td>
                            <td>{{ $borrowing->details->map(fn ($d) => $d->book->title ?? '-')->implode(', ') }}</td>
                            <td>
                                @if($borrowing->status === 'returned')
                                    <span class="badge badge-blue">Dikembalikan</span>
                                @elseif($borrowing->isTerlambat())
                                    <span class="badge badge-red">Terlambat</span>
                                @else
                                    <span class="badge badge-yellow">Dipinjam</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="table-empty">Anggota ini belum pernah meminjam buku.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection