@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-tambah">+ Tambah Kategori</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $c)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $c->nama ?? $c->name }}</td>
                            <td>{{ $c->deskripsi ?? $c->description ?? '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('categories.destroy', $c->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="text-align: center;">Belum ada kategori.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection