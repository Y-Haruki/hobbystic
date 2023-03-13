@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 hobbystic-container">
            <h3 class="mt-3 mb-3 text-center hobbystic-login">新規会員登録</h3>

            <br>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="col-md-5 col-form-label text-md-left">ユーザ名<span class="ml-1 hobbystic-require-input-label"><span class="hobbystic-require-input-label-text">必須</span></span></label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror hobbystic-login-input " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1 hobbystic-require-input-label"><span class="hobbystic-require-input-label-text">必須</span></span></label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror hobbystic-login-input" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span class="ml-1 hobbystic-require-input-label"><span class="hobbystic-require-input-label-text">必須</span></span></label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror hobbystic-login-input" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left">パスワード（確認）</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control hobbystic-login-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div>
                    <a class="btn btn-link mt-3 mb-1 d-flex justify-content-center hobbystic-login-text" href="{{ route('login') }}">
                        既に登録済みですか？
                    </a>
                </div>

                <div class="form-group hobbystic-button-container">
                    <button type="submit" class="btn hobbystic-submit-button w-auto">
                        会員登録
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection