@extends('layouts.app')

@section('title', 'Edit Anggota - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Edit Data Anggota</h2>

        @include('partials.errors')

        <form action="{{ route('members.update', $member) }}" method="POST">
            @csrf
            @method('PUT')
            @include('members._form')

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Update Anggota</button>
                <a href="{{ route('members.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection