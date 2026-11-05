@extends('layouts.app')

@section('title', 'Edit User - Perpustakaan')

@section('content')
    <div class="card form-card">
        <h2 class="page-title">Edit User</h2>

        @include('partials.errors')

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password Baru (opsional)</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Kosongkan jika tidak diubah">
            </div>

            <div class="form-group">
                <label class="form-label" for="role">Role</label>
                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="petugas" {{ old('role', $user->role) === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-simpan">Update User</button>
                <a href="{{ route('users.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection