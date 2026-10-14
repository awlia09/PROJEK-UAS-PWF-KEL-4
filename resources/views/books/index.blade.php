<h2>Daftar Buku</h2>
<table border="1">
    <tr><th>No</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th></tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->year }}</td>
        <td>{{ $book->stock }}</td>
    </tr>
    @endforeach
</table>