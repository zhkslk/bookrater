@extends('layouts.app')
@section('title', 'Books' . (request('page') > 1 ? ', page ' . request('page') : ''))

@section('content')

    <h1 class="mb-5">Books</h1>

    <div class="row row-flex mb-5">
        @each('pages.inc._book_item', $books, 'book')
    </div>

    <div>
        {{ $books->render() }}
    </div>

@endsection
