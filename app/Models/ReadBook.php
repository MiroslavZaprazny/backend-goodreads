<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadBook extends Model
{
    use HasFactory;

    protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
