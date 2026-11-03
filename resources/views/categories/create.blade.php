@extends('layouts.app')

@section('content')
<h2>Tambah Kategori</h2>

@if($errors->any())
    <ul class="text-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br>
    <label>Deskripsi</label><br>
    <textarea name="description">{{ old('description') }}</textarea><br>
    <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
    <a href="{{ route('categories.index') }}">Kembali</a>
</form>
@endsection