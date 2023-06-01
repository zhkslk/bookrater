<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Book $book;

    public function render()
    {
        return view('livewire.book.comments', [
            'comments' => $this->book->comments()->latest()->paginate(10),
        ]);
    }
}
