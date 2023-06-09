<div class="col-6 col-md-4 col-lg-3 mb-4">
    <div class="card h-100">
        <div class="w-75 mx-auto p-2">
            <a href="{{ route('book', $book) }}">
                <img src="{{ $book->cover }}" class="img-thumbnail" alt="{{ $book->title }}">
            </a>
        </div>
        <div class="card-body">
            <div class="mb-2">
                <x-rating :rating="$book->rating" />
            </div>
            <h5 class="card-title">
                <a href="{{ route('book', $book) }}" class="text-black link-underline-light">
                    {{ $book->title }}
                </a>
            </h5>
            <p class="card-text">
                {{ $book->short_description }}
            </p>
        </div>
    </div>
</div>
