<div>
  <a href="{{ route('hobbies.index') }}">投稿一覧</a><span>&gt;詳細</span>
</div>
<div>ジャンル</div>
<div>アイコン</div>
<div>
  <a href="{{ route('hobbies.edit', $hobby->id) }}">編集する</a>
</div>
<div>{{ $hobby->image }}</div>
<div>{{ $hobby->title }}</div>
<div>{{ $hobby->content }}</div>
<div>場所</div>
<div>チャット機能</div>
<form action="{{ route('hobbies.destroy', $hobby->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type='submit'>Delete</button>
</form>