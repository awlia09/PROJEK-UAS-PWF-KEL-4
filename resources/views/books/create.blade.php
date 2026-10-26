<h2>Tambah Buku</h2>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label>Judul</label><br>
    <input type="text" name="title"><br>
    <label>Penulis</label><br>
    <input type="text" name="author"><br>
    <label>Kategori</label><br>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>
    <label>Tahun</label><br>
    <input type="number" name="year"><br>
    <label>Stok</label><br>
    <input type="number" name="stock"><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('books.index') }}">Kembali</a>