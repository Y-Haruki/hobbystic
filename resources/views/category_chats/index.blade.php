@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h2>{{ $category->name }}&gt;掲示板</h2>
    <a href="{{ route('categories.show', $category->id) }}" class="link">掲示板一覧へ戻る</a>
  </div>
  <form action="{{ route('categories.category_chats.store', $category->id) }}" method='POST'>
    @csrf

    <div class="text-center">
      <textarea name="chat" class="bulletin-board" placeholder="こちらに入力してください"></textarea>
    </div>
    <p><small>誹謗，中傷及び不適切な発言はしないでください<br>掲示板入力はログイン後に可能です</small></p>
    <div class="text-center">
      <button type="submit" class="px-2 py-1 category-button">作成</button>
    </div>
  </form>
  <hr>
  @foreach ($category_chats as $category_chat)
  <div>
    @if ($category_chat->category_id === $category->id)
    <div class="d-flex align-items-center">
      <div>
        <div class="rounded-circle icon-image board-user-icon text-center">
          @if ($category_chat->user->icon === 'default_icon')
          <img src="{{ asset('images/default_icon.png') }}" alt="" class="">
          @else
          <img src="{{ asset('storage/images/'.$category_chat->user->icon) }}" alt="" width="100%" height="100%">
          @endif
        </div>
      </div>
      <div>{{ $category_chat->chat }}</div>
    </div>
    <p class="">{{ optional($category_chat->user)->name }}</p>
    @endif
  </div>
  @endforeach
</div>

@endsection