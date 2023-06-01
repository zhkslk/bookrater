<div>
    @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-md-4">
                        {{ $comment->name }}
                    </div>
                    <div class="col-12 col-md-4 text-md-center">
                        stars
                    </div>
                    <div class="col-12 col-md-4 text-md-end text-secondary" style="font-size: 0.9rem">
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $comment->body }}
            </div>
        </div>
    @endforeach

    <div class="my-4">
        {{ $comments->render() }}
    </div>
</div>
