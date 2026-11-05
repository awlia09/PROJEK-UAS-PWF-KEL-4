@extends('layouts.app')

@section('title', 'Daftar Anggota - Perpustakaan')

@section('content')
    <div class="card">
        <div class="card-header-custom">
            <h2 class="page-title">Daftar Anggota</h2>
            <a href="{{ route('members.create') }}" class="btn btn-tambah">+ Tambah Anggota</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-no">No</th>
                        <th>Kode Member</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <td class="col-no">{{ $loop->iteration }}</td>
                            <td><strong>{{ $member->kode_member }}</strong></td>
                            <td>{{ $member->nama }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->nomor_hp ?: '-' }}</td>
                            <td>{{ $member->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $member->tanggal_daftar->format('d-m-Y') }}</td>
                            <td class="col-actions">
                                <div class="btn-group">
                                    <a href="{{ route('members.show', $member) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('members.edit', $member) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $member) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="table-empty">Belum ada data anggota.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection