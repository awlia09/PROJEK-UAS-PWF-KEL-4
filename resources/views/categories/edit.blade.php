@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Edit Kategori</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $category->nama ?? $category->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $category->deskripsi ?? $category->description) }}</textarea>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Update Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection