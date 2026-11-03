@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title" style="margin: 0;">Daftar Anggota</h2>
            <a href="{{ route('members.create') }}" class="btn btn-tambah">+ Tambah Anggota</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>
                                    {{ $m->kode_member ?? $m->kode_anggota ?? '-' }}
                                </strong>
                            </td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->email }}</td>
                            <td>
                                {{ $m->nomor_hp ?? $m->no_hp ?? '-' }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('members.show', $m->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('members.edit', $m->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $m->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="text-align: center;">Belum ada data anggota.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection