<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'authors',
        'isbn'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }
}
