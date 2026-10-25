@extends('layouts.app')

@section('content')
<h3>Detail Peminjaman</h3>

<p>Anggota: {{ $borrowing->member->nama }}</p>
<p>Petugas: {{ $borrowing->user->name }}</p>
<p>Tanggal Pinjam: {{ $borrowing->tanggal_peminjaman->format('d-m-Y') }}</p>
<p>Jatuh Tempo: {{ $borrowing->batas_pinjam->format('d-m-Y') }}</p>
<p>Tanggal Kembali: {{ $borrowing->tanggal_pengembalian ? $borrowing->tanggal_pengembalian->format('d-m-Y') : '-' }}</p>
<p>Status: {{ $borrowing->status }}</p>

<p>Buku yang dipinjam:</p>
<ul>
    @foreach ($borrowing->details as $detail)
        <li>{{ $detail->book->title }} ({{ $detail->kuantitas }})</li>
    @endforeach
</ul>

<a href="{{ route('borrowings.index') }}">Kembali</a>
@endsection