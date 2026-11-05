@extends('layouts.app')

@section('title', 'Tambah Anggota - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Tambah Anggota Baru</h2>

        @include('partials.errors')

        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            @include('members._form')

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan Anggota</button>
                <a href="{{ route('members.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection