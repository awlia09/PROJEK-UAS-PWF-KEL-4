@extends('layouts.app')

@section('title', 'Detail Buku - Perpustakaan')

@section('content')
    <div class="card detail-card">
        <h2 class="page-title">Detail Buku</h2>

        <dl class="detail-list">
            <dt>Judul</dt>
            <dd>{{ $book->title }}</dd>

            <dt>Penulis</dt>
            <dd>{{ $book->author }}</dd>

            <dt>Kategori</dt>
            <dd>{{ $book->category->name ?? '-' }}</dd>

            <dt>Tahun Terbit</dt>
            <dd>{{ $book->year }}</dd>

            <dt>Stok Tersisa</dt>
            <dd><span class="badge badge-stok">{{ $book->stock }}</span></dd>
        </dl>

        <div class="form-actions">
            @can('update', $book)
                <a href="{{ route('books.edit', $book) }}" class="btn btn-edit">Edit</a>
            @endcan
            <a href="{{ route('books.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>
@endsection