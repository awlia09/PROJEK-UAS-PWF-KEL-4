@extends('layouts.app')

@section('content')
<h3>Peminjaman Baru</h3>

@if ($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('borrowings.store') }}" method="POST">
    @csrf

    <p>
        Anggota:<br>
        <select name="member_id">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->kode_member }} - {{ $member->nama }}</option>
            @endforeach
        </select>
    </p>

    <p>
        Tanggal Peminjaman:<br>
        <input type="date" name="tanggal_peminjaman" value="{{ date('Y-m-d') }}">
    </p>

    <p>
        Pilih Buku:<br>
        @foreach ($books as $book)
            <label>
                <input type="checkbox" name="books[]" value="{{ $book->id }}">
                {{ $book->title }} (stok: {{ $book->stock }})
            </label><br>
        @endforeach
    </p>

    <button type="submit">Simpan</button>
    <a href="{{ route('borrowings.index') }}">Batal</a>
</form>
@endsection