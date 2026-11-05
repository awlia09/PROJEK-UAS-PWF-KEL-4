@extends('layouts.app')

@section('title', 'Daftar Buku - Perpustakaan')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title">Daftar Buku</h2>

            @can('create', App\Models\Book::class)
                <a href="{{ route('books.create') }}" class="btn btn-tambah">+ Tambah Buku</a>
            @endcan
        </div>

        <form method="GET" action="{{ route('books.index') }}" class="filter-form">
            <label class="form-label" for="category_id">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select form-select-auto">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
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
                        <th class="col-no">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th class="col-center">Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td class="col-no">{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name ?? '-' }}</td>
                            <td>{{ $book->year }}</td>
                            <td class="col-center"><span class="badge badge-stok">{{ $book->stock }}</span></td>
                            <td class="col-actions">
                                <div class="btn-group">
                                    @can('view', $book)
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">Detail</a>
                                    @endcan

                                    @can('update', $book)
                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-edit btn-sm">Edit</a>
                                    @endcan

                                    @can('delete', $book)
                                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="table-empty">Tidak ada buku pada kategori ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection