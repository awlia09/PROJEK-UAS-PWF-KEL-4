@extends('layouts.app')

@section('title', 'Edit Buku - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Edit Buku</h2>

        @include('partials.errors')

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label" for="title">Judul Buku</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="author">Penulis</label>
                <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror"
                       value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="category_id">Kategori</label>
                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="year">Tahun Terbit</label>
                <input type="number" id="year" name="year" class="form-control @error('year') is-invalid @enderror"
                       value="{{ old('year', $book->year) }}" required min="1900" max="{{ date('Y') }}">
            </div>

            <div class="form-group">
                <label class="form-label" for="stock">Stok Buku</label>
                <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror"
                       value="{{ old('stock', $book->stock) }}" required min="0">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Update Buku</button>
                <a href="{{ route('books.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection