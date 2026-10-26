<h2>Daftar Kategori</h2>
<a href="{{ route('categories.create') }}">Tambah Kategori</a>

<table border="1">
    <tr><th>No</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <a href="{{ route('categories.edit', $category) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>