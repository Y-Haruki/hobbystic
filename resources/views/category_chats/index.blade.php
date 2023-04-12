@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h2>{{ $category->name }}&gt;掲示板</h2>
    <a href="{{ route('categories.show', $category->id) }}">戻る</a>
  </div>
  <form action="{{ route('categories.category_chats.store', $category->id) }}" method='POST'>
    @csrf

    <div>
      <textarea name="chat" cols="30" rows="10"></textarea>
    </div>
    <div>
      <button type="submit" class="px-2 py-1">作成</button>
    </div>
  </form>
  @foreach ($category_chats as $category_chat)
  <div>
    @if ($category_chat->category_id === $category->id)
    <div class="d-flex">
      <div class="rounded-circle icon-image board-user-icon">
        @if ($category_chat->user->icon === 'default_icon')
        <img src="{{ asset('images/default_icon.png') }}" alt="" class="">
        @else
        <img src="{{ asset('images/'.$category_chat->user->icon) }}" alt="" width="100%" height="100%">
        @endif
      </div>
      <p>{{ optional($category_chat->user)->name }}</p>
    </div>
    <div>{{ $category_chat->chat }}</div>
    @endif
  </div>
  @endforeach
</div>

@endsection