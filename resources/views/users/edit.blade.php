@extends('layouts.app')
 
@section('content')

<div class="container">
  
  <hr>
  
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
  
  <h4>プロフィール情報</h4>
  
  <form method="POST" action="{{ route('mypage') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <!-- <input type="hidden" name="_method" value="PATCH"> -->
    <div class="cover-image">
      @if ($user->image === 'default_image')
      <img src="{{ asset('images/default_image.png') }}" alt="" width="100%" height="100%">
      @else
      <img src="{{ asset('storage/images/'.$user->image) }}" alt="" width="100%" height="100%">
      @endif
      <!-- <img src="{{ asset('images/'.$user->image) }}" alt="" width="100%" height="100%"> -->
      <label class="edit-button">
        <input type="file" name='image' class="mb-4" accept='.png, .jpg, .jpeg, .pdf, .doc'>
        <i class="fas fa-pencil-alt"></i>
      </label>
    </div>
    <div class="d-flex justify-content-around mt-5">
      <div class="icon-container">
        <div class="rounded-circle icon-image">
          <!-- <img src="{{ asset('images/'.$user->icon) }}" alt="" width="100%" height="100%"> -->
          @if ($user->icon === 'default_icon')
          <img src="{{ asset('images/default_icon.png') }}" alt="" class="">
          @else
          <img src="{{ asset('storage/images/'.$user->icon) }}" alt="" width="100%" height="100%">
          @endif
        </div>
        <label class="edit-icon-button">
          <input type="file" name='icon' class="mb-4" accept='.png, .jpg, .jpeg, .pdf, .doc'>
          <i class="fas fa-pencil-alt"></i>
        </label>
      </div>
      <div>
        <p class="mb-0">ユーザ名</p>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>氏名を入力してください</strong>
        </span>
        @enderror

        <p class="mb-0">メールアドレス</p>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>メールアドレスを入力してください</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="d-flex justify-content-end mb-0 mt-3">
      <button type="submit" class="">保存</button>
    </div>
    <hr class="mt-0">
  </form>

  <h4>パスワード変更</h4>
  <form method="POST" action="{{ route('mypage.update_password') }}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group row mb-3">
      <label for="password" class="col-md-3 col-form-label text-md-right">新しいパスワード</label>
      <div class="col-md-7">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
  
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="form-group row mb-3">
      <label for="password-confirm" class="col-md-3 col-form-label text-md-right">パスワード確認</label>

      <div class="col-md-7">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>

    <div class="form-group d-flex justify-content-center">
      <button type="submit" class="btn btn-danger w-25">
          パスワード更新
      </button>
    </div>
  </form>

  <!-- 退会機能（要確認） -->
  <hr class="mt-0">

  <div class="d-flex justify-content-start">
    <form method="POST" action="{{ route('mypage.destroy') }}">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn dashboard-delete-link" data-bs-toggle="modal" data-bs-target="#delete-user-confirm-modal">退会する</div>

      <div class="modal fade" id="delete-user-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><label>本当に退会しますか？</label></h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-center">一度退会するとデータはすべて削除され復旧はできません。</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn dashboard-delete-link" data-bs-dismiss="modal">キャンセル</button>
              <button type="submit" class="btn samuraimart-delete-submit-button">退会する</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!--  -->

@endsection