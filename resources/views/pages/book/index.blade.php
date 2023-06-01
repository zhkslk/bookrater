@extends('layouts.app')
@section('title', $book->title)

@section('content')

    <div class="col-12 col-md-8 offset-md-2">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{ $book->cover }}" alt="{{ $book->title }}" class="img-fluid img-thumbnail w-75">
            </div>
            <div class="col-12 col-md-8">
                <h1 class="mb-4">
                    {{ $book->title }}
                </h1>
                @include('pages.book._rating')
                <div>
                    {{ $book->description }}
                </div>
            </div>
        </div>
    </div>

@endsection
