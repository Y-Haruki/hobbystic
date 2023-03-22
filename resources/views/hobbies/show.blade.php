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
    </div>
    <div class="d-flex justify-content-around">
      <div class="image">
        {{ $hobby->image }}
      </div>
      <div class="title">
        {{ $hobby->title }}
      </div>
    </div>
    <div class="show-content ">
      {{ $hobby->content }}
    </div>
    <div>場所</div>
    <div>チャット機能</div>
    <div class="d-flex justify-content-end">
      <div>
        <a href="{{ route('hobbies.edit', $hobby->id) }}">編集する</a>
      </div>
      <form action="{{ route('hobbies.destroy', $hobby->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type='submit'>Delete</button>
      </form>
    </div>
  </div>
</div>

@endsection