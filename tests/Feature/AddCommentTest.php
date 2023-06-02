<?php

namespace Tests\Feature;

use App\Http\Livewire\Book\AddComment;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AddCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_comment_can_be_added(): void
    {
        $book = Book::factory()->create();

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', 'Name')
            ->set('rating', 2)
            ->set('body', 'Comment body')
            ->call('submit');

        $this->assertTrue(
            Comment::where('book_id', $book->id)->where('name', 'Name')->exists()
        );
    }

    public function test_comment_must_have_name(): void
    {
        $book = Book::factory()->create();

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', '')
            ->set('rating', 2)
            ->set('body', 'Comment body')
            ->call('submit')
            ->assertHasErrors(['name' => 'required']);
    }

    public function test_comment_must_have_rating(): void
    {
        $book = Book::factory()->create();

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', 'Name')
            ->set('rating', '')
            ->set('body', 'Comment body')
            ->call('submit')
            ->assertHasErrors(['rating' => 'required']);
    }

    public function test_comment_must_have_body(): void
    {
        $book = Book::factory()->create();

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', 'Name')
            ->set('rating', 2)
            ->set('body', '')
            ->call('submit')
            ->assertHasErrors(['body' => 'required']);
    }

    public function test_comment_rating_must_be_between_0_and_5(): void
    {
        $book = Book::factory()->create();

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', 'Name')
            ->set('rating', 2)
            ->set('body', 'Comment body')
            ->call('submit');

        $this->assertTrue(
            Comment::where('book_id', $book->id)->where('name', 'Name')->exists()
        );

        Livewire::test(AddComment::class)
            ->set('book', $book)
            ->set('name', 'Name')
            ->set('rating', 6)
            ->set('body', 'Comment body')
            ->call('submit')
            ->assertHasErrors(['rating' => 'max']);
    }
}
