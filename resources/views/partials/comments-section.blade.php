<div class="col-12" style="margin-top: 200px">
    <div class="row">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="comment">Написать комментарий:</label>
                <div class="row">
                    <input type="hidden" name="tierlist_id" id="tierlist_id" value="{{ $tierlist->id }}">
                    <textarea placeholder="Комментарий" class="form-control bg-dark border-black text-white" name="comment" id="comment"
                        cols="30" rows="10" maxlength="1023"></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    @foreach($comments as $comment)
        @include('partials.comment', ['comment' => $comment])
    @endforeach
</div>
