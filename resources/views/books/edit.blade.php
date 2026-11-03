@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Edit Buku</h2>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $book->judul ?? $book->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $book->penulis ?? $book->author) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nama ?? $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $book->tahun ?? $book->year) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ old('stok', $book->stok ?? $book->stock) }}" required>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Update Buku</button>
                <a href="{{ route('books.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection