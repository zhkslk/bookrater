<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Book::factory()
             ->count(100)
             ->create()
             ->each(function($book) {
                 Comment::factory()->count(rand(5, 35))->createQuietly([
                     'book_id' => $book->id,
                 ]);
             });

        $this->command->line("Calculating books rating...");
        Artisan::call('books:calculate-rating');

        $this->command->info("Seeding completed successfully.");
    }
}
