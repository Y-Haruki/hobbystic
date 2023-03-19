<nav class="navbar navbar-expand-md navbar-light shadow-sm hobbystic-header-container">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <i>
            {{ config('app.name', 'Laravel') }}
          </i>
        </a>
        <form class="row g-1">
          <div class="col-auto">
            <input class="form-control hobbystic-header-search-input" placeholder="キーワードで検索">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon">button</i></button>
          </div>

          <div class="col-auto">
            <input class="form-control hobbystic-header-search-input" placeholder="ユーザ名で検索">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon">button</i></button>
          </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @if (Auth::guest())
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <hr>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
                  </li>
                @else
                <li class="nav-item mr-5">
                    <a href="{{ route('hobbies.create') }}"> 投稿する</a>
                    
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      ログアウト
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                @endif

                <!-- ログアウト後に表示されるヘッダー -->
                @if (session('logout'))
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <hr>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
                  </li>
                @endif
            </ul>
        </div>
    </div>
</nav>