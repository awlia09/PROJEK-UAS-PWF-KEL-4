@extends('layouts.app')

@section('title', 'Tambah User - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Tambah User Baru</h2>

        @include('partials.errors')

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required placeholder="Nama user">
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required placeholder="user@email.com">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       required minlength="8" placeholder="Minimal 8 karakter">
                <div class="form-hint">Minimal 8 karakter.</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="role">Role</label>
                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="petugas" {{ old('role') === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Simpan User</button>
                <a href="{{ route('users.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection