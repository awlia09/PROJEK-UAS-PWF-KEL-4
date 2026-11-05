@if($errors->any())
    <div class="alert alert-danger">
        <div class="alert-title">Data belum bisa disimpan. Periksa kembali isian berikut:</div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif