@extends('layouts.app')

@section('content')

<div class="container">
  <div>
    <a href="{{ route('hobbies.index') }}" class="h2">投稿一覧</a><span class="h3">&gt;詳細</span>
  </div>
  <div class="container-show border p-2 mt-2">
    <div class="d-flex justify-content-between">
      <div>
        @foreach($categories as $category)
          <a href="">{{ $category->name }}</a>
        @endforeach
      </div>
      <div>{{ $hobby->created_at }}</div>
    </div>
    <div class="d-flex justify-content-end">
      <div>ユーザ名</div>
      <div>アイコン</div>
      @if ($hobby->user_id != auth()->id())
        @if (Auth::user())
          @if($hobby->isFavoritedBy(Auth::user()))
          <a href="{{ route('hobbies.favorite', $hobby) }}" class="btn text-favorite ">
              <i class="fa fa-heart"></i>
              お気に入り解除
          </a>
          @else
          <a href="{{ route('hobbies.favorite', $hobby) }}" class="btn text-favorite ">
              <i class="fa fa-heart"></i>
              お気に入り登録
          </a>
          @endif
        @endif
      @endif
    </div>
    <div class="d-flex justify-content-around">
      <div class="image">
        <img src="{{ asset('storage/images/'.$hobby->image) }}"  width="100" height="100">
      </div>
      <div class="title">
        {{ $hobby->title }}
      </div>
    </div>
    <div class="show-content ">
      {{ $hobby->content }}
    </div>
    <div>場所</div>
    <a href="{{ route('hobby_chats.index') }}">チャット機能</a>
    <div>
      <div class="chat-container row justify-content-center">
          <div class="chat-area">
              <div class="card">
                  <div class="card-header">Comment</div>
                  <div class="card-body chat-card">
                      <div id="comment-data"></div>
                  </div>
              </div>
          </div>
      </div>
      
      <form action="{{route('add', $hobby->id)}}" method="POST">
          @csrf
          <div class="comment-container row justify-content-center">
              <div class="input-group comment-area">
                  <textarea class="form-control" name="chat" placeholder="push massage (shift + Enter)" aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                  <button type="submit" id="submit" class="btn btn-outline-primary comment-btn" >Submit</button>
              </div>
          </div>
      </form>
    </div>
    <div class="d-flex justify-content-end">
      @if ($hobby->user_id == auth()->id())
        <div>
          <a href="{{ route('hobbies.edit', $hobby->id) }}">編集する</a>
        </div>
        <form action="{{ route('hobbies.destroy', $hobby->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type='submit'>Delete</button>
        </form>
      @endif
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
  window.Laravel = {};
  window.Laravel.hobby_id = @json($hobby->id);
</script>
<script src="{{ asset('js/comment.js') }}"></script>
@endsection