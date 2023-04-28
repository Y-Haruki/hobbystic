@extends('layouts.app')

@section('content')
<div class="container">
  <h1>
    <i>あなたの趣味ライフをもっと楽しく！<br>
    　　　　　　　　　Hobbysticで新しい発見を</i>
  </h1>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-item active cover-image" data-bs-interval="7000">
        <img src="{{ asset('images/pic1.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item cover-image" data-bs-interval="7000">
        <img src="{{ asset('images/pic2.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item cover-image" data-bs-interval="7000">
        <img src="{{ asset('images/pic3.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item cover-image">
        <img src="{{ asset('images/pic4.png') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="d-flex justify-content-between mt-2">
    <form class="row g-1">
      <div class="col-auto">
        <input class="form-control hobbystic-header-search-input" placeholder="キーワードで検索">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon"></i></button>
      </div>
    </form>
    <div class="d-flex align-items-center">
      <div>投稿数:{{ $hobby->count() }}</div>
      <div>趣味数:{{ $category->count() }}</div>
    </div>
  </div>
  <div class="mt-5">
    <h4>人気の趣味</h4>
    <!-- お気に入り登録が沢山されてる趣味を上位3つほど選んで表示 -->
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
  <div class="mt-5 d-flex justify-content-around">
    <div>
      @foreach ($categories as $category)
      <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
      @endforeach
    </div>

    <a href="{{ route('categories.index') }}">カテゴリ一覧へ</a>
  </div>

  <!-- 性格診断 -->
  <!-- カテゴリ -->
  <div class="mt-5">
    <h4>カテゴリから探す</h4>
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-flex flex-wrap">
          @foreach ($categoryRandoms as $category)
          <div class="category-item">
            <img src="{{ asset('storage/images/'.$category->image) }}">
            <div class="mt-2">
              <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- ユーザ -->
  <div class="row justify-content-center mt-5">
    <div class="d-flex ">
      <h4>人気ユーザ</h4>
      <form class="row g-1" method="GET" action="{{ route('users.index') }}">
        <div class="col-auto">
          <input type="search" class="form-control hobbystic-header-search-input" placeholder="ユーザ名で検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon"></i></button>
        </div>
      </form>
      <div class="d-flex ">
        <a href="{{ route('users.index') }}">ユーザ一覧へ</a>
        <a href="{{ route('hobbies.index') }}">投稿一覧へ</a>
      </div>
    </div>
    <div class="col-10">
      @foreach ($users as $user)
      <div class="user-item">
        <a href="{{ route('users.show', $user->id) }}">
          <div class="d-flex">
            <div class="user-image">
              @if ($user->image === 'default_image')
              <img src="{{ asset('images/default_image.png') }}" alt="" width="100%" height="100%">
              @else
              <img src="{{ asset('storage/images/'.$user->image) }}" alt="" width="100%" height="100%">
              @endif
            </div>
            <div class="user-content">
              <div class="d-flex align-items-center">
                <div class="rounded-circle icon-image">
                  @if ($user->icon === 'default_icon')
                  <img src="{{ asset('images/default_icon.png') }}" alt="" class="">
                  @else
                  <img src="{{ asset('storage/images/'.$user->icon) }}" alt="" width="100%" height="100%">
                  @endif
                </div>
                <div class="user-name">{{$user->name}}</div>
              </div>
              <div class="stats">
                <a href="{{ route('users.follows', $user->id) }}">フォロー:{{ $user->follows()->count() }}</a>
                <a href="{{ route('users.followers', $user->id) }}">フォロワー:{{$user->followings()->count()}}</a>
                
              </div>
              <a href="#" class="profile-link">プロフィール</a>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
@endsection