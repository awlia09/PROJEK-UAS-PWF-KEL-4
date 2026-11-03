@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title">Detail Buku</h2>
        <div style="margin-top: 1rem; line-height: 2;">
            <p><strong>Judul:</strong> {{ $book->judul ?? $book->title }}</p>
            <p><strong>Penulis:</strong> {{ $book->penulis ?? $book->author }}</p>
            <p><strong>Kategori:</strong> {{ $book->category->nama ?? $book->category->name ?? '-' }}</p>
            <p><strong>Tahun:</strong> {{ $book->tahun ?? $book->year }}</p>
            <p><strong>Stok Tersisa:</strong> <span class="badge-stok">{{ $book->stok ?? $book->stock }}</span></p>
        </div>

        <div class="btn-group" style="margin-top: 1.5rem;">
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-edit">Edit</a>
            <a href="{{ route('books.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>
@endsection