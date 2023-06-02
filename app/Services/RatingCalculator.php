<?php

namespace App\Services;

use App\Models\Book;

class RatingCalculator
{
    public static function handle(Book $book): float
    {
        return $book->comments()->average('rating');
    }
}
