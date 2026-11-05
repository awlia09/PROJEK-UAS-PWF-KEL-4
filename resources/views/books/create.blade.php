@extends('layouts.app')

@section('title', 'Tambah Buku - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Tambah Buku</h2>

        @include('partials.errors')

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="title">Judul Buku</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required placeholder="Masukkan judul buku">
            </div>

            <div class="form-group">
                <label class="form-label" for="author">Penulis</label>
                <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror"
                       value="{{ old('author') }}" required placeholder="Masukkan nama penulis">
            </div>

            <div class="form-group">
                <label class="form-label" for="category_id">Kategori</label>
                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="year">Tahun Terbit</label>
                <input type="number" id="year" name="year" class="form-control @error('year') is-invalid @enderror"
                       value="{{ old('year') }}" required min="1900" max="{{ date('Y') }}" placeholder="Contoh: 2024">
            </div>

            <div class="form-group">
                <label class="form-label" for="stock">Stok Buku</label>
                <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror"
                       value="{{ old('stock') }}" required min="0" placeholder="Masukkan jumlah stok">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan Buku</button>
                <a href="{{ route('books.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection