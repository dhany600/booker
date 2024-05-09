<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories_detail', 'book_id', 'categories_id');
    }
}
