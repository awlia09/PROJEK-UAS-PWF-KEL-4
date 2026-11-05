@extends('layouts.app')

@section('title', 'Peminjaman Baru - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Peminjaman Baru</h2>

        @include('partials.errors')

        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="member_id">Anggota</label>
                <select id="member_id" name="member_id" class="form-select @error('member_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->kode_member }} - {{ $member->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="tanggal_peminjaman">Tanggal Peminjaman</label>
                <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                       class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                       value="{{ old('tanggal_peminjaman', date('Y-m-d')) }}" required>
                <div class="form-hint">Jatuh tempo otomatis 1 minggu setelah tanggal peminjaman.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Pilih Buku</label>
                <div class="checkbox-list">
                    @forelse($books as $book)
                        <label class="checkbox-item">
                            <input type="checkbox" name="books[]" value="{{ $book->id }}"
                                {{ in_array($book->id, old('books', [])) ? 'checked' : '' }}>
                            <span>{{ $book->title }} <strong>(stok: {{ $book->stock }})</strong></span>
                        </label>
                    @empty
                        <span class="text-muted">Tidak ada buku dengan stok tersedia.</span>
                    @endforelse
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan Peminjaman</button>
                <a href="{{ route('borrowings.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection