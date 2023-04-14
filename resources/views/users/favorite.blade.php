@extends('layouts.app')
 
@section('content')


<div class="container hobby-index-container">
  <hr class="mt-0">
  
  <div class="row text-center">
    <a href="{{ route('hobbies.index') }}" class="col-3">投稿</a>
    <a href="{{ route('mypage.favorite') }}" class="col-3">お気に入り</a>
    <a href="{{ route('mypage.edit') }}" class="col-3">会員情報編集</a>
    <a href="{{ route('logout') }}" class="col-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
  
  <hr>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex flex-wrap">
        @foreach ($favorites as $fav)
        <div class="item">
          <a href="{{ route('hobbies.show', $fav->favoriteable_id) }}">
          <div class="hobby-image">
            <img src="{{ asset('storage/images/'.App\Models\Hobby::find($fav->favoriteable_id)->image) }}" alt="" width="100%" height="100%">
            
          </div>
          <h3 class="hobby-title">{{App\Models\Hobby::find($fav->favoriteable_id)->title}}</h3>
        </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection