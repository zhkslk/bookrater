<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_book_can_be_created(): void
    {
        Book::factory()->create();

        $this->assertDatabaseCount('books', 1);
    }

    public function test_book_must_have_title(): void
    {
        try {
            Book::factory()->create(['title' => null]);
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('books', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }

    public function test_book_must_have_description(): void
    {
        try {
            Book::factory()->create(['description' => null]);
        } catch (\Exception $e) {
            $this->assertInstanceOf(QueryException::class, $e);

            $this->assertDatabaseCount('books', 0);

            return;
        }

        $this->fail('An exception was not thrown');
    }
}
