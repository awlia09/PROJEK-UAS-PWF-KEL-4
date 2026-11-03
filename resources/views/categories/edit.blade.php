@extends('layouts.app')

@section('content')
<h2>Edit Kategori</h2>

@if($errors->any())
    <ul class="text-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name', $category->name) }}"><br>
    <label>Deskripsi</label><br>
    <textarea name="description">{{ old('description', $category->description) }}</textarea><br>
    <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
    <a href="{{ route('categories.index') }}">Kembali</a>
</form>
@endsection