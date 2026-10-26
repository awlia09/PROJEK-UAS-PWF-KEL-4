<h2>Edit Kategori</h2>
<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ $category->name }}"><br>
    <label>Deskripsi</label><br>
    <textarea name="description">{{ $category->description }}</textarea><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('categories.index') }}">Kembali</a>