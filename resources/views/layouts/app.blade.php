<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sistem Informasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @auth
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Brand / Judul Projek -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">Perpustakaan Sistem Informasi</a>
            
            <!-- Menu Navigasi Utama -->
            <ul class="nav-menu">
                <li><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
                <li><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                <li><a class="nav-link" href="{{ route('members.index') }}">Anggota</a></li>
                <li><a class="nav-link" href="{{ route('borrowings.index') }}">Peminjaman</a></li>
                
                <!-- Menggunakan Gate @can('manage-users') Sesuai Materi Pembelajaran -->
                @can('manage-users')
                    <li><a class="nav-link" href="{{ route('users.index') }}">User</a></li>
                @endcan
            </ul>

            <!-- Profil User & Logout -->
            <div style="display: flex; align-items: center; gap: 1.2rem; margin-left: 1.5rem;">
                <span style="color: white; font-weight: 600; font-size: 1.05rem; white-space: nowrap;">
                    {{ Auth::user()?->name ?? 'Pengguna' }} ({{ ucfirst(Auth::user()?->role ?? 'User') }})
                </span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-batal btn-sm" style="padding: 0.4rem 0.9rem; font-size: 0.95rem;">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>