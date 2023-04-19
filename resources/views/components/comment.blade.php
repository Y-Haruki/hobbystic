<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">{{$hobby_chat->user->name}}</span>
            <span class="comment-body-time">{{$hobby_chat->created_at}}</span>
        </div>
        <span class="comment-body-content">
            {!! nl2br(e($hobby_chat->chat)) !!}
        </span>
    </div>
</div>