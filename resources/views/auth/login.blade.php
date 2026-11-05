@extends('layouts.app')

@section('title', 'Login - Perpustakaan')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <h2 class="login-title">Perpustakaan</h2>
        <p class="login-subtitle">Silakan login untuk mengakses sistem</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password"
                       class="form-control" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn btn-simpan">Login</button>
        </form>
    </div>
</div>
@endsection