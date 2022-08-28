<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentlyReading extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'current_page', 'status'];
    protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
