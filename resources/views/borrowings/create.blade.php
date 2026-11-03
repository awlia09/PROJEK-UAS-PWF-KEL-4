@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Peminjaman Baru</h2>

        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Anggota</label>
                <select name="member_id" class="form-select" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($members as $m)
                        <option value="{{ $m->id }}">{{ $m->nama ?? $m->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="borrowed_at" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Pilih Buku</label>
                <div class="checkbox-list">
                    @foreach($books as $book)
                        <label class="checkbox-item">
                            <input type="checkbox" name="book_ids[]" value="{{ $book->id }}">
                            <span>{{ $book->judul ?? $book->title }} <strong>(stok: {{ $book->stok ?? $book->stock }})</strong></span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Simpan Peminjaman</button>
                <a href="{{ route('borrowings.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection