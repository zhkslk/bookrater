<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Services\RatingCalculator;
use Illuminate\Console\Command;

class CalculateBooksRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:calculate-rating';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $books = Book::all();

        foreach ($books as $book) {
            $rating = RatingCalculator::handle($book);

            /** @var Book $book */
            $book->updateRating($rating);
        }
    }
}
