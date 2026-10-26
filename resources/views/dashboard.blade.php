@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Anda login sebagai {{ ucfirst(Auth::user()->role) }}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Judul Buku</h5>
                <p class="card-text fs-3">{{ $totalTitles }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Stok Buku</h5>
                <p class="card-text fs-3">{{ $totalStock }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Anggota</h5>
                <p class="card-text fs-3">{{ $totalMembers }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Sedang Dipinjam</h5>
                <p class="card-text fs-3">{{ $borrowedCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection