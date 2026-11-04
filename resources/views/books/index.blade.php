@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Daftar Buku</h2>
            
            {{-- Tombol Tambah Buku hanya tampil jika diizinkan Policy 'create' --}}
            @can('create', App\Models\Book::class)
                <a href="{{ route('books.create') }}" class="btn btn-tambah">+ Tambah Buku</a>
            @endcan
        </div>

        <form method="GET" action="{{ route('books.index') }}" style="display: flex; gap: 0.6rem; align-items: center; margin-bottom: 1.5rem;">
            <label class="form-label" style="margin: 0;">Kategori:</label>
            <select name="category_id" class="form-select" style="width: auto;">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama ?? $cat->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-simpan btn-sm">Filter</button>
            <a href="{{ route('books.index') }}" class="btn btn-batal btn-sm">Reset</a>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $index => $b)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $b->judul ?? $b->title }}</td>
                            <td>{{ $b->penulis ?? $b->author }}</td>
                            <td>{{ $b->category->nama ?? $b->category->name ?? '-' }}</td>
                            <td>{{ $b->tahun ?? $b->year }}</td>
                            <td>{{ $b->stok ?? $b->stock }}</td>
                            <td>
                                <div class="btn-group">
                                    {{-- Tombol Detail dapat dilihat oleh user yang memiliki izin 'view' --}}
                                    @can('view', $b)
                                        <a href="{{ route('books.show', $b->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    @endcan

                                    {{-- Tombol Edit dibungkus @can('update', $b) --}}
                                    @can('update', $b)
                                        <a href="{{ route('books.edit', $b->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus dibungkus @can('delete', $b) --}}
                                    @can('delete', $b)
                                        <form action="{{ route('books.destroy', $b->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" style="text-align: center;">Belum ada data buku.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection