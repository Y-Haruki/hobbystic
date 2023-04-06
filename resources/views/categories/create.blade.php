@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('hobbies.create') }}">&gt; 戻る</a>
  <h2>カテゴリ作成</h2>

  <form action="{{ route('categories.store') }}" method='POST'>
    @csrf

    <div>
      <label for="name">カテゴリ名</label>
      <input type="text" id='name' name="name" placeholder='カテゴリ名を入力してください'>
    </div>
    <div>
      <label for="image">画像</label>
      <input type="file" name="image" id="image" placeholder="画像を入力してください" accept='.png, .jpg, .jpeg, .pdf, .doc'>
    </div>
    <div>
      <button type="submit" class="px-2 py-1">作成</button>
    </div>
  </form>
</div>
@endsection