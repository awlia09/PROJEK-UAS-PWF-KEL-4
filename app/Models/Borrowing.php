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

    protected $casts = [
        'tanggal_peminjaman'   => 'date',
        'batas_pinjam'         => 'date',
        'tanggal_pengembalian' => 'date',
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function details() {
        return $this->hasMany(BorrowingDetail::class);
    }
}