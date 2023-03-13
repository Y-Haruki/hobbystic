@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 hobbystic-container">
            <h3 class="mt-3 mb-3 text-center hobbystic-login">ログイン</h3>

            <br>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-5">
                    <p class="mb-0">メールアドレス</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror hobbystic-login-input" name="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="mb-0">パスワード</p>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror hobbystic-login-input" name="password" required autocomplete="current-password" placeholder="パスワード">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>パスワードが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label hobbystic-check-label w-100" for="remember">
                            次回から自動的にログインする
                        </label>
                    </div>
                </div>

                <div class="form-group hobbystic-button-container">
                    <a class="btn btn-link mt-3 d-flex justify-content-center hobbystic-login-text" href="{{ route('password.request') }}">
                        パスワードをお忘れですか？
                    </a>

                    <button type="submit" class="mt-3 btn w-auto hobbystic-submit-button">
                        ログイン
                    </button>

                </div>
            </form>

            <br>

            <!-- <div>
                <a class="btn btn-link mt-3 d-flex justify-content-center samuraimart-login-text" href="{{ route('register') }}">
                    新規登録
                </a>
            </div> -->
        </div>
    </div>
</div>
@endsection