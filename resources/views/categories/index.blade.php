@extends('layouts.app')

@section('title', 'Daftar Kategori - Perpustakaan')

@section('content')
    @php($isAdmin = auth()->user()->role === 'admin')

    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title">Daftar Kategori</h2>

            @if($isAdmin)
                <a href="{{ route('categories.create') }}" class="btn btn-tambah">+ Tambah Kategori</a>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-no">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        @if($isAdmin)
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="col-no">{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description ?: '-' }}</td>
                            @if($isAdmin)
                                <td class="col-actions">
                                    <div class="btn-group">
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-edit btn-sm">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr><td colspan="{{ $isAdmin ? 4 : 3 }}" class="table-empty">Belum ada kategori.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection