<h2>Tambah Kategori</h2>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label>Nama</label><br>
    <input type="text" name="name"><br>
    <label>Deskripsi</label><br>
    <textarea name="description"></textarea><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('categories.index') }}">Kembali</a>