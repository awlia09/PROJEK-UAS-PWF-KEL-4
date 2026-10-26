<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['kode_member', 'nama', 'email', 'nomor_hp', 'jenis_kelamin', 'tanggal_daftar'];
}

public function borrowings()
{
    return $this->hasMany(Borrowing::class);
}