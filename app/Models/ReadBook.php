<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadBook extends Model
{
    use HasFactory;

    protected $with = ['book', 'notes'];

    protected $fillable = ['user_id', 'book_id', 'status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function notes()
    {
        return $this->belongsTo(UserNote::class, 'book_id', 'book_id');
    }
}
