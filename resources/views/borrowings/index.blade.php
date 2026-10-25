@extends('layouts.app')

@section('content')
<h3>Data Peminjaman</h3>

<a href="{{ route('borrowings.create') }}">+ Peminjaman Baru</a>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="6">
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

    @forelse ($borrowings as $borrowing)
        <tr>
            <td>{{ $borrowing->member->nama }}</td>
            <td>{{ $borrowing->user->name }}</td>
            <td>{{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</td>
            <td>{{ $borrowing->batas_pinjam->format('d-m-Y') }}</td>
            <td>{{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : '-' }}</td>
            <td>
                @foreach ($borrowing->details as $detail)
                    {{ $detail->book->title }}<br>
                @endforeach
            </td>
            <td>{{ $borrowing->status }}</td>
            <td>
                <a href="{{ route('borrowings.show', $borrowing) }}">Detail</a>

                @if ($borrowing->status === 'borrowed')
                    <form action="{{ route('borrowings.return', $borrowing) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Kembalikan</button>
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8">Belum ada peminjaman.</td>
        </tr>
    @endforelse
</table>
@endsection