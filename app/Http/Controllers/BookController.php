<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::latest()->paginate(12);

        return view('pages.index', compact('books'));
    }
}
