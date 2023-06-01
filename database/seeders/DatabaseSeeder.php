<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Seeder;

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
                 Comment::factory()->count(rand(5, 35))->create([
                     'book_id' => $book->id
                 ]);
             });
    }
}
