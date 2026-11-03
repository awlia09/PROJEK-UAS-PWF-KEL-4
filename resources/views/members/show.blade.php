@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title">Detail Anggota</h2>
        <div style="margin-top: 1rem; line-height: 2;">
            <p><strong>Kode Anggota:</strong> {{ $member->kode_anggota ?? $member->code }}</p>
            <p><strong>Nama:</strong> {{ $member->nama ?? $member->name }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>No HP:</strong> {{ $member->no_hp ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $member->alamat ?? '-' }}</p>
        </div>

        <div class="btn-group" style="margin-top: 1.5rem;">
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-edit">Edit</a>
            <a href="{{ route('members.index') }}" class="btn btn-batal">Kembali</a>
        </div>
    </div>
@endsection