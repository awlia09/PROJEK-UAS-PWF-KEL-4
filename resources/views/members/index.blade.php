@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Anggota</h3>
        <a href="{{ route('members.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member->kode_member }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email ?? '-' }}</td>
                    <td>{{ $member->nomor_hp }}</td>
                    <td>{{ $member->jenis_kelamin }}</td>
                    <td>{{ $member->tanggal_daftar->format('d M Y') }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('members.show', $member) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection