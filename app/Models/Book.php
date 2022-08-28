<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $with = ['author', 'reviews'];

    protected $appends = ['reviewCount', 'avgRating'];

    public function getReviewCountAttribute()
    {
       return count($this->reviews); 
    }

    public function getAvgRatingAttribute()
    {
        $sum = 0;

        foreach($this->reviews as $review)
        {
            $sum += (int) $review->rating; 
        }
        
        return ($sum/ count($this->reviews));
    }

    protected $casts = [
        'published_at'  => 'date:Y-m-d',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function reviewCount()
    {
        return count($this->reviews);
    }
}
