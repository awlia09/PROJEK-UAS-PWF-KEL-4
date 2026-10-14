<h2>Daftar Kategori</h2>
<table border="1">
    <tr><th>No</th><th>Nama Kategori</th></tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
    </tr>
    @endforeach
</table>