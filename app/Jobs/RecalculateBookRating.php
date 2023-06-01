<?php

namespace App\Jobs;

use App\Models\Book;
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
        $averageRating = $this->book->comments()->average('rating');
        $this->book->update([
            'rating' => round($averageRating, 2),
        ]);
    }
}
