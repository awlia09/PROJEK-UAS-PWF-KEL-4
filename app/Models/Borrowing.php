<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id', 
        'member_id', 
        'tanggal_peminjaman', 
        'batas_pinjam', 
        'tanggal_pengembalian', 
        'status'
    ];
}
