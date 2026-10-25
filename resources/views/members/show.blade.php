@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Anggota</h3>

    <table class="table table-bordered w-50">
        <tr><th>Kode Member</th><td>{{ $member->kode_member }}</td></tr>
        <tr><th>Nama</th><td>{{ $member->nama }}</td></tr>
        <tr><th>Email</th><td>{{ $member->email ?? '-' }}</td></tr>
        <tr><th>Nomor HP</th><td>{{ $member->nomor_hp }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $member->jenis_kelamin }}</td></tr>
        <tr><th>Tanggal Daftar</th><td>{{ $member->tanggal_daftar->format('d M Y') }}</td></tr>
    </table>

    <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection