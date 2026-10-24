@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')

    <h2>Daftar Member Perpustakaan</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Member</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->kode_member }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_hp }}</td>
                    <td>{{ $member->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $member->tanggal_daftar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('members.destroy', $member) }}" method="POST"
            onsubmit="return confirm('Yakin hapus?')">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
