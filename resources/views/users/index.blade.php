@extends('layouts.app')

@section('content')
<div class="container hobby-index-container">
  <h2>ユーザ一覧</h2>
  <div class="row justify-content-center">
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
                <div>投稿数:XX</div>
                <div>フォロワー:XX</div>
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
@endsection
