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
</div>

@endsection