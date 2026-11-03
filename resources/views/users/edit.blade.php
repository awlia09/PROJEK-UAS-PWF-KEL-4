@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Edit User</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password Baru (Opsional)</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
            </div>

            <div class="form-group">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Update User</button>
                <a href="{{ route('users.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection