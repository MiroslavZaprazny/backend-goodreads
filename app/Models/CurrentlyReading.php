<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentlyReading extends Model
{
    use HasFactory;

    protected $fillabe = ['current_page'];
    protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
