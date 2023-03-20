@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('hobbies.index') }}">&gt; 戻る</a>
  <h2>投稿作成</h2>
  
  <form action="{{ route('hobbies.store') }}" method='POST'>
    @csrf
  
    <div>
      <label>name</label>
      <input type="text" name="name" placeholder='例）サッカー'>
    </div>
    <div>
      <p class="mb-0 mt-4">カテゴリーを選択してください</p>
      <select name="category_id" class="mb-4">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="title1">タイトル</label>
      <input type="text" name='title' class="w-50 mb-4" id='title1' placeholder='タイトルを入力してください（必須）'>
    </div>
    <div>
      <label for="image">画像を入力してください</label>
      <input type="file" name='image' class="mb-4" accept='.png, .jpg, .jpeg, .pdf, .doc'>
    </div>
    <div>
      <label for="content1">内容</label>
      <textarea name="content" id="content1" class="w-100 mb-4 create-textarea" rows="5" placeholder='内容を入力してください'></textarea>
    </div>
    <!-- <div>
      <p>場所を登録してください</p>
    </div> -->
    <div class="text-center">
      <button type='submit' class="px-2 py-1">作成</button>
    </div>
  </form>
</div>

@endsection