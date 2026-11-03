@extends('layouts.app')

@section('content')
<h2>Tambah Buku</h2>

@if($errors->any())
    <ul class="text-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label>Judul</label><br>
    <input type="text" name="title" value="{{ old('title') }}"><br>
    <label>Penulis</label><br>
    <input type="text" name="author" value="{{ old('author') }}"><br>
    <label>Kategori</label><br>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>
    <label>Tahun</label><br>
    <input type="number" name="year" value="{{ old('year') }}"><br>
    <label>Stok</label><br>
    <input type="number" name="stock" value="{{ old('stock') }}"><br>
    <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection