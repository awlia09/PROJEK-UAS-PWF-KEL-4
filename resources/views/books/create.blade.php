@extends('layouts.app')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Tambah Buku</h2>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control" required placeholder="Masukkan judul buku">
            </div>

            <div class="form-group">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" required placeholder="Masukkan nama penulis">
            </div>

            <div class="form-group">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun" class="form-control" required placeholder="Contoh: 2024">
            </div>

            <div class="form-group">
                <label class="form-label">Stok Buku</label>
                <input type="number" name="stok" class="form-control" required placeholder="Masukkan jumlah stok">
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Simpan Buku</button>
                <a href="{{ route('books.index') }}" class="btn btn-kembali">Kembali</a>
            </div>
        </form>
    </div>
@endsection