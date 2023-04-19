@extends('layouts.app')
 
@section('content')

<div class="container">
  <a href="{{ route('users.index') }}">ユーザ一覧へ戻る</a>
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
        <a href="">フォロー</a>
        <a href="">フォロワー</a>
        <button class="btn">フォローする</button>
      </div>
    </div>
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