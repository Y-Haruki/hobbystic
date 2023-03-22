@extends('layouts.app')
 
@section('content')

<div class="container">
  <h2>マイページ</h2>
  <div class="cover-image">
    {{ $user->image }}カバー写真
  </div>
  <div class="d-flex justify-content-around">
    <div>
      <i class="fas fa-user fa-3x"></i>
      {{ $user->icon }}ユーザアイコン
    </div>
    <div>
      <div>{{ $user->name }}</div>
      <div>
        <a href="">フォロー</a>
        <a href="">フォロワー</a>
      </div>
    </div>
  </div>

  <hr>

  <div class="row text-center">
    <a href="{{ route('hobbies.index') }}" class="col-3">投稿</a>
    <a href="" class="col-3">お気に入り</a>
    <a href="{{ route('mypage.edit') }}" class="col-3">会員情報編集</a>
    <a href="{{ route('logout') }}" class="col-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
  </div>
  
  <hr>

</div>

@endsection