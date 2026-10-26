<h2>Tambah Kategori</h2>
@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label>Nama</label><br>
    <input type="text" name="name"><br>
    <label>Deskripsi</label><br>
    <textarea name="description"></textarea><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('categories.index') }}">Kembali</a>