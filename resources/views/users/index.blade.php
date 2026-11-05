@extends('layouts.app')

@section('title', 'Manajemen User - Perpustakaan')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title">Manajemen User</h2>
            <a href="{{ route('users.create') }}" class="btn btn-tambah">+ Tambah User</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-no">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="col-no">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge badge-purple">{{ ucfirst($user->role) }}</span></td>
                            <td class="col-actions">
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="table-empty">Belum ada user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection