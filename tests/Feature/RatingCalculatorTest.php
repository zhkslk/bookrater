<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Comment;
use App\Services\RatingCalculator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingCalculatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculates_rating_correctly(): void
    {
        $book = Book::factory()->create();

        $ratings = range(1, 5);

        foreach ($ratings as $rating) {
            Comment::factory()->create([
                'book_id' => $book->id,
                'rating' => $rating,
            ]);
        }

        $expected = RatingCalculator::handle($book);

        $actual = array_sum($ratings) / count($ratings);

        $this->assertEquals($expected, $actual);
    }
}
