@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('categories.show', $category->id) }}">&gt; 戻る</a>
  <h2>カテゴリ編集</h2>

  <form action="{{ route('categories.update', $category->id) }}" method='POST' enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
      <label for="name">カテゴリ名</label>
      <input type="text" id='name' name="name" placeholder='カテゴリ名を入力してください' value="{{ $category->name }}">
    </div>
    <div>
      <label for="image">画像</label>
      <input type="file" name="image" id="image" placeholder="画像を入力してください" accept='.png, .jpg, .jpeg, .pdf, .doc'>
    </div>
    <div>
      <button type="submit" class="px-2 py-1">更新</button>
    </div>
  </form>
</div>

@endsection