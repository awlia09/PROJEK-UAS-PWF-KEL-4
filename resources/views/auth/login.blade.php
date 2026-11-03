@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <h2 class="login-title">Perpustakaan</h2>
        <p class="login-subtitle">Silakan login untuk mengakses sistem</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn btn-simpan">Login</button>
        </form>
    </div>
</div>
@endsection