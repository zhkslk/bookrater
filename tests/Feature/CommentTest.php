<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_comment_can_be_created(): void
    {
        $book = Book::factory()->create();

        Comment::factory()->create([
            'book_id' => $book->id
        ]);

        $this->assertDatabaseCount('comments', 1);
    }

    public function test_comment_must_have_book_id(): void
    {
        try {
            Comment::factory()->create();
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('comments', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }

    public function test_comment_must_have_name(): void
    {
        $book = Book::factory()->create();

        try {
            Comment::factory()->create([
                'book_id' => $book->id,
                'name' => null,
            ]);
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('comments', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }

    public function test_comment_must_have_body(): void
    {
        $book = Book::factory()->create();

        try {
            Comment::factory()->create([
                'book_id' => $book->id,
                'body' => null,
            ]);
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('comments', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }

    public function test_comment_must_have_rating(): void
    {
        $book = Book::factory()->create();

        try {
            Comment::factory()->create([
                'book_id' => $book->id,
                'rating' => null,
            ]);
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('comments', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }
}
