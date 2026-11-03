@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Tambah User Baru</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required placeholder="Nama user">
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="user@email.com">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Password">
            </div>

            <div class="form-group">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Simpan User</button>
                <a href="{{ route('users.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection