@extends('layouts.app')

@section('content')
<h2>Daftar Kategori</h2>

@if(auth()->user()->role === 'admin')
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Kategori</a>
@endif

<table class="table table-bordered bg-white">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        @if(auth()->user()->role === 'admin')
            <th>Aksi</th>
        @endif
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        @if(auth()->user()->role === 'admin')
        <td>
            <a href="{{ route('categories.edit', $category) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>
@endsection