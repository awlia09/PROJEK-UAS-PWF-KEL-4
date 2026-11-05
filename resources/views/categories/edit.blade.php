@extends('layouts.app')

@section('title', 'Edit Kategori - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Edit Kategori</h2>

        @include('partials.errors')

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label" for="name">Nama Kategori</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Update Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection