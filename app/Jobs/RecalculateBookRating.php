<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Book;
use App\Services\RatingCalculator;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecalculateBookRating
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Book $book,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $rating = RatingCalculator::handle($this->book);

        $this->book->updateRating($rating);
    }
}
