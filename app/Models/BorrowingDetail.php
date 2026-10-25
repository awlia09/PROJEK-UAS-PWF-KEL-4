<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingDetail extends Model
{
    protected $fillable = [
        'borrowing_id', 
        'book_id', 
        'kuantitas'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function borrowing() {
        return $this->belongsTo(Borrowing::class);
    }
}