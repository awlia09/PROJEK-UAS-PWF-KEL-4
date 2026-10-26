<h2>Edit Buku</h2>
@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Judul</label><br>
    <input type="text" name="title" value="{{ $book->title }}"><br>
    <label>Penulis</label><br>
    <input type="text" name="author" value="{{ $book->author }}"><br>
    <label>Kategori</label><br>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>
    <label>Tahun</label><br>
    <input type="number" name="year" value="{{ $book->year }}"><br>
    <label>Stok</label><br>
    <input type="number" name="stock" value="{{ $book->stock }}"><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('books.index') }}">Kembali</a>