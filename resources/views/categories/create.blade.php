@extends('layouts.app')

@section('title', 'Tambah Kategori - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Tambah Kategori</h2>

        @include('partials.errors')

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Nama Kategori</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required placeholder="Contoh: Novel, Komik">
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="3"
                          placeholder="Deskripsi kategori (opsional)">{{ old('description') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection