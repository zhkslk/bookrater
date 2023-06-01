@extends('layouts.app')
@section('title', $book->title)

@section('content')

    <div class="col-12 col-md-8 offset-md-2">
        <div class="row mb-3">
            <div class="col-12 col-md-4 text-center">
                <img src="{{ $book->cover }}" alt="{{ $book->title }}" class="img-thumbnail w-75">
            </div>
            <div class="col-12 col-md-8">
                <h1 class="my-3">
                    {{ $book->title }}
                </h1>
                @include('pages.book._rating')
                <div>
                    {{ $book->description }}
                </div>
            </div>
        </div>
        <div>
            <div class="text-center fs-4 mb-3">
                Comments
            </div>
            <livewire:book.comments :book="$book" />
        </div>
    </div>

@endsection
