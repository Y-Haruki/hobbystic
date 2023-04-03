@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('hobbies.show', $hobby->id) }}">&gt; 戻る</a>
  <h2>投稿編集</h2>
  
  <form action="{{ route('hobbies.update', $hobby->id) }}" method='POST' enctype="multipart/form-data">
    @csrf
    @method('PUT')
  
    <div>
      <label>name</label>
      <input type="text" name="name" value="{{ $hobby->name }}">
    </div>
    <div>
      <p class="mb-0 mt-4">カテゴリーを選択してください</p>
      <select name="category_id[]" class="mb-4" multiple>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <script>
      $(function () {
        $('select').multipleSelect({
          width: 200,
          formatSelectAll: function() {
            return 'すべて';
          },
          formatAllSelected: function() {
            return '全て選択されています';
          },
        });
      });
      </script>
    </div>
    <div>
      <label for="title1">タイトル</label>
      <input type="text" name='title' id='title1' placeholder='タイトルを入力してください（必須）' value='{{ $hobby->title }}'>
    </div>
    <div>
      <label for="image">画像を入力してください</label>
      <input type="file" name='image' accept='.png, .jpg, .jpeg, .pdf, .doc' value='{{ $hobby->image }}'>
    </div>
    <div>
      <label for="content1">内容</label>
      <textarea name="content" id="content1" cols="100" rows="10" placeholder='内容を入力してください'>{{ $hobby->content }}</textarea>
    </div>
    <!-- <div>
      <p>場所を登録してください</p>
    </div> -->
    <div class="text-center">
      <button type='submit' class="px-2 py-1">更新</button>
    </div>
  </form>
</div>

@endsection