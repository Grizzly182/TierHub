<div class="card bg-dark text-white mt-2">
    <div class="card-body">
        <div class="row">
            <div style="width: 30px; height:30px;">
                <img class="rounded-5 object-fit-cover" height="30" width="30" src="{{ asset('storage/' . ($comment->user()->avatar ? $comment->user()->avatar : 'images/dwOQpRYGR0FjaQsuxk6t5nkqK4nIVZjxl5Sa3oa8.jpg')) }}">
            </div>
            <p class="card-text">{{ $comment->content }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-text text-white-50">{{ $comment->created_at->diffForHumans() }}</p>
                <a href="{{ route('profile', $comment->user()) }}"
                    class="card-text text-white-50 text-end">{{ $comment->user()->name }}</a>
            </div>
        </div>
    </div>
</div>
