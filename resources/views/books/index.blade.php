@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<h2>Daftar Buku</h2>
<a href="{{ route('books.create') }}">Tambah Buku</a>

<form action="{{ route('books.index') }}" method="GET" style="margin: 10px 0">
    <label>Kategori:</label>
    <select name="category_id">
        <option value="">Semua kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
    <a href="{{ route('books.index') }}">Reset</a>
</form>

<table border="1">
    <tr><th>No</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr>
    @forelse($books as $book)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->category->name }}</td>
        <td>{{ $book->year }}</td>
        <td>{{ $book->stock }}</td>
        <td>
            <a href="{{ route('books.show', $book) }}">Detail</a>
            <a href="{{ route('books.edit', $book) }}">Edit</a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus buku ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="7">Tidak ada buku pada kategori ini.</td></tr>
    @endforelse
</table>