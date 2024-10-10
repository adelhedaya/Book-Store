<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}

