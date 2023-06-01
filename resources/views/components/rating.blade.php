@if ($fulls)
    @foreach(range(1, $fulls) as $f)
        <i class="bi bi-star-fill bi-star-yellow"></i>
    @endforeach
@endif

@if ($empties)
    @foreach(range(1, $empties) as $e)
        <i class="bi bi-star-fill bi-star-gray"></i>
    @endforeach
@endif
