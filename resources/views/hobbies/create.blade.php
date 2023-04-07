@extends('layouts.app')

@section('content')

<div class="container">
  <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <!-- 背景のオーバーレイ -->
    <div class="modal-overlay" tabindex="-1" data-micromodal-close>
      <div
        class="modal-container"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-1-title"
      >
        <header class="modal-header">
          <h2 class="modal-title" id="modal-1-title">カテゴリ作成</h2>
          <!-- 閉じるボタン -->
          <button
            class="modal-close"
            aria-label="Close modal"
            data-micromodal-close
          ></button>
        </header>
        <!-- モーダルのコンテンツ -->
        <div class="modal-content" id="modal-1-content">
          <div class="container">
            <!-- <a href="{{ route('hobbies.create') }}">&gt; 戻る</a> -->
            <!-- <h2>カテゴリ作成</h2> -->
  
            <form action="{{ route('categories.store') }}" method='POST' enctype="multipart/form-data">
              @csrf
  
              <div>
                <label for="name">カテゴリ名</label>
                <input type="text" id='name' name="name" placeholder='カテゴリ名を入力してください' autocomplete="off">
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
        </div>
      </div>
    </div>
  </div>
  <a href="{{ route('hobbies.index') }}">&gt; 戻る</a>
  <h2>投稿作成</h2>
  <button data-micromodal-trigger="modal-1" class="modal-open">
    カテゴリ作成
  </button>
  
  <form action="{{ route('hobbies.store') }}" method='POST' enctype="multipart/form-data">
    @csrf
  
    <div>
      <p class="mb-0 mt-4">カテゴリーを選択してください</p>
      <select name="category_id[]" class="mb-4" multiple>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <!-- <a href="#" id="add-category-link">新しい要素を追加する</a> -->
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
      <label>name</label>
      <input type="text" name="name" placeholder='例）サッカー'>
    </div>
    <!-- <a href="{{ route('categories.create') }}">カテゴリ作成</a> -->

    <!-- 開くボタン -->
    
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


<script>
  MicroModal.init();
</script>
@endsection