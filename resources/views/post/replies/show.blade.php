@foreach($comments as $comment)
    <div class="display-comment media-body">
        <strong>{{ $comment->author->user_name }}</strong>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach
