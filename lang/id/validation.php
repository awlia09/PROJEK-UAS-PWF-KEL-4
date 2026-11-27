<?php

return [
    'required' => ':attribute wajib diisi.',
    'email'    => ':attribute harus berupa alamat email yang valid.',
    'string'   => ':attribute harus berupa teks.',
    'integer'  => ':attribute harus berupa angka bulat.',
    'date'     => ':attribute bukan tanggal yang valid.',
    'array'    => ':attribute harus berupa pilihan (array).',
    'unique'   => ':attribute sudah digunakan.',
    'exists'   => ':attribute yang dipilih tidak valid.',
    'in'       => ':attribute yang dipilih tidak valid.',
    'regex'    => 'Format :attribute tidak valid.',

    'max' => [
        'string'  => ':attribute maksimal :max karakter.',
        'numeric' => ':attribute maksimal :max.',
        'array'   => ':attribute maksimal :max item.',
    ],
    'min' => [
        'string'  => ':attribute minimal :min karakter.',
        'numeric' => ':attribute minimal :min.',
        'array'   => ':attribute minimal :min item.',
    ],

    'attributes' => [
        'name'               => 'Nama',
        'email'              => 'Email',
        'password'           => 'Password',
        'role'               => 'Role',
        'title'              => 'Judul buku',
        'author'             => 'Penulis',
        'category_id'        => 'Kategori',
        'year'               => 'Tahun terbit',
        'stock'              => 'Stok',
        'description'        => 'Deskripsi',
        'kode_member'        => 'Kode member',
        'nama'               => 'Nama anggota',
        'nomor_hp'           => 'No. HP',
        'jenis_kelamin'      => 'Jenis kelamin',
        'tanggal_daftar'     => 'Tanggal daftar',
        'member_id'          => 'Anggota',
        'tanggal_peminjaman' => 'Tanggal peminjaman',
        'books'              => 'Buku',
    ],
];
