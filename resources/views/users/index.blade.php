@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Manajemen User</h2>
            <a href="{{ route('users.create') }}" class="btn btn-tambah">+ Tambah User</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $u)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td><span class="badge-stok" style="background-color: var(--pastel-purple);">{{ ucfirst($u->role) }}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="text-align: center;">Belum ada user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection