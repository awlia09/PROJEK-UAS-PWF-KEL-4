@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Anggota</h3>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        @include('members._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection