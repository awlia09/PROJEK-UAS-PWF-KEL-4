@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Anggota</h3>

    <table class="table table-bordered w-50">
        <tr><th>Kode Member</th><td>{{ $member->kode_member }}</td></tr>
        <tr><th>Nama</th><td>{{ $member->nama }}</td></tr>
        <tr><th>Email</th><td>{{ $member->email ?? '-' }}</td></tr>
        <tr><th>Nomor HP</th><td>{{ $member->nomor_hp }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $member->jenis_kelamin }}</td></tr>
        <tr><th>Tanggal Daftar</th><td>{{ $member->tanggal_daftar->format('d M Y') }}</td></tr>
    </table>

    <h5 class="mt-4">Riwayat Peminjaman</h5>
<table class="table table-bordered">
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
        @forelse ($member->borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</td>
                <td>{{ $borrowing->batas_pinjam->format('d-m-Y') }}</td>
                <td>{{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : '-' }}</td>
                <td>
                    @foreach ($borrowing->details as $detail)
                        {{ $detail->book->title }}@if (!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ ucfirst($borrowing->status) }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">Belum pernah meminjam.</td></tr>
        @endforelse
    </tbody>
</table>

    <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection