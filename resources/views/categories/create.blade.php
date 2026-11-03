@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Tambah Kategori</h2>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" required placeholder="Contoh: Novel, Komik">
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi kategori"></textarea>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Simpan Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection