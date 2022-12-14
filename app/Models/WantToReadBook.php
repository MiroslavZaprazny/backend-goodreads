<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WantToReadBook extends Model
{
    use HasFactory;

    protected $with = ['book'];

    protected $fillable = ['user_id', 'book_id', 'status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
