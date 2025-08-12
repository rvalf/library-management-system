<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'librarian_id',
        'book_id',
        'loan_at',
        'returned_at',
        'note',
    ];

    protected $casts = [
        'loan_at' => 'datetime',
        'returned_at' => 'datetime',
    ];


    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function librarian()
    {
        return $this->belongsTo(User::class, 'librarian_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
