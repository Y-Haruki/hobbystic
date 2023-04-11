@extends('layouts.app')

@section('content')
<div class="container hobby-index-container">
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
          <h2 class="modal-title" id="modal-1-title">カテゴリ編集</h2>
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
        </div>
      </div>
    </div>
  </div>

  <button data-micromodal-trigger="modal-1" class="modal-open">
    カテゴリ編集
  </button>

  <div class="d-flex justify-content-between">
    <h2>{{ $category->name }}&gt;投稿一覧</h2>
    <a href="{{ route('categories.category_chats.index', $category->id) }}">掲示板へ</a>
  </div>
  <!-- <a href="{{ route('categories.edit', $category->id) }}">カテゴリ編集</a> -->
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex flex-wrap">
        @foreach ($hobbies as $hobby)
        <div class="item">
          <a href="{{ route('hobbies.show', $hobby->id) }}">
            <div class="hobby-image">
              <img src="{{ asset('storage/images/'.$hobby->image) }}" alt="" width="100%" height="100%">
              <!-- {{ $hobby->image }} -->
            </div>
            <h3 class="hobby-title">{{ $hobby->title }}</h3>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<script>
  MicroModal.init();
</script>

@endsection