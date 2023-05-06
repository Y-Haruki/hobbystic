@extends('layouts.app')
 
@section('content')

<div class="container">
  <h2>マイページ</h2>
  <div class="cover-image">
    @if ($user->image === 'default_image')
    <img src="{{ asset('images/default_image.png') }}" alt="" width="100%" height="100%">
    @else
    <img src="{{ asset('storage/images/'.$user->image) }}" alt="" width="100%" height="100%">
    @endif
  </div>
  <div class="d-flex justify-content-around mt-3 icon-and-name">
    <div class="rounded-circle icon-image">
      @if ($user->icon === 'default_icon')
      <img src="{{ asset('images/default_icon.png') }}" alt="" class="">
      @else
      <img src="{{ asset('storage/images/'.$user->icon) }}" alt="" width="100%" height="100%">
      @endif
    </div>
    <div class="name-and-follow">
      <div class="user-name">{{ $user->name }}</div>
      <div>
        <a href="{{ route('users.follows', $user->id) }}">フォロー:{{ $user->follows()->count() }}</a>
        <a href="{{ route('users.followers', $user->id) }}">フォロワー:{{ $user->followings()->count() }}</a>
      </div>
    </div>
  </div>

  <hr>

  <div class="row text-center">
    <a href="{{ route('hobbies.index') }}" class="col-3 link">投稿</a>
    <a href="{{ route('mypage.favorite') }}" class="col-3 link">お気に入り</a>
    <a href="{{ route('mypage.edit') }}" class="col-3 link">会員情報編集</a>
    <a href="{{ route('logout') }}" class="col-3 link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <hr>
  
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex flex-wrap">
        @foreach ($hobbies as $hobby)
        <div class="item">
          <a href="{{ route('hobbies.show', $hobby->id) }}">
            <div class="hobby-image">
              <img src="{{ asset('storage/images/'.$hobby->image) }}" alt="" width="100%" height="100%">
            </div>
            <h3 class="hobby-title">{{ $hobby->title }}</h3>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection