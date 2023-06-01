<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class AddComment extends Component
{
    /** @var Book $book */
    public $book;
    public $name;
    public $body;
    public $rating;

    protected $rules = [
        'name' => 'required|min:3',
        'rating' => 'required|integer|min:0|max:5',
        'body' => 'required|min:10',
    ];

    protected $validationAttributes = [
        'body' => 'comment',
    ];

    public function submit()
    {
        $validated = $this->validate();

        $this->book->comments()->create($validated);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.book.add-comment');
    }
}
