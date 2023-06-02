<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Book;

class RatingCalculator
{
    public static function handle(Book $book): float
    {
        return (float) $book->comments()->average('rating') ?? 0.0;
    }
}
