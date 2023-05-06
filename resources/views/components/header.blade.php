<nav class="navbar navbar-expand-md navbar-light shadow-sm hobbystic-header-container sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('images/logo.png') }}" alt="">
          <i>
            {{ config('app.name', 'Laravel') }}
          </i>
        </a>
        <div class="search">
          <form class="row g-1" method="GET" action="{{ route('hobbies.index') }}">
            <div class="col-auto d-flex">
              <input type="search" class="form-control hobbystic-header-search-input" placeholder="キーワードで検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
              <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon"></i></button>
            </div>
            <!-- <div class="col-auto">
            </div> -->
          </form>
          <form class="row g-1" method="GET" action="{{ route('users.index') }}">
            <div class="col-auto d-flex">
              <input type="search" class="form-control hobbystic-header-search-input" placeholder="ユーザ名で検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
              <button type="submit" class="btn hobbystic-header-search-button"><i class="fas fa-search hobbystic-header-search-icon"></i></button>
            </div>
            <!-- <div class="col-auto">
            </div> -->
          </form>
        </div>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @if (Auth::guest())
                  <li class="nav-item mr-5 regist">
                    <a class="nav-link hide0" href="{{ route('register') }}">会員登録</a>
                  </li>
                  <li class="nav-item mr-5 regist">
                    <a class="nav-link hide0" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  
                  <button type="button" class="menu-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                  <div class="menu">
                    <div class="menu__item"><a href="{{ url('/') }}">TOP</a></div>
                    <div class="menu__item"><a href="{{ route('mypage') }}">マイページ</a></div>
                    <div class="menu__item"><a href="{{ route('hobbies.index') }}">投稿一覧</a></div>
                    <div class="menu__item"><a href="{{ route('categories.index') }}">カテゴリ一覧</a></div>
                    <div class="menu__item"><a href="{{ route('users.index') }}">ユーザ一覧</a></div>
                    <div class="menu__item"><a class="hide" href="{{ route('register') }}">会員登録</a></div>
                    <div class="menu__item"><a class="hide" href="{{ route('login') }}">{{ __('Login') }}</a></div>
                    <div class="menu__item">使い方</div>
                  </div>
                  <!-- <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
                  </li> -->
                @else
                  <li class="nav-item mr-5 hide0">
                    <a href="{{ route('hobbies.create') }}" class="link"> 投稿する</a>
                    
                    <a href="{{ route('mypage') }}" class="link">
                      <i class="fas fa-user mr-1"></i><label>マイページ</label>
                    </a>
                  </li>
                  
                  <!-- <nav>
                    <div class="hamburger-menu">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                    <ul class="menu-items">
                      <li><a href="#">Menu Item 1</a></li>
                      <li><a href="#">Menu Item 2</a></li>
                      <li><a href="#">Menu Item 3</a></li>
                      <li><a href="#">Menu Item 4</a></li>
                    </ul>
                  </nav> -->
                  <button type="button" class="menu-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                  <div class="menu">
                    <div class="menu__item"><a href="{{ url('/') }}">TOP</a></div>
                    <div class="menu__item"><a href="{{ route('mypage') }}">マイページ</a></div>
                    <div class="menu__item"><a href="{{ route('hobbies.index') }}">投稿一覧</a></div>
                    <div class="menu__item"><a href="{{ route('categories.index') }}">カテゴリ一覧</a></div>
                    <div class="menu__item"><a href="{{ route('users.index') }}">ユーザ一覧</a></div>
                    <div class="menu__item hide"><a href="{{ route('hobbies.create') }}"> 投稿する</a></div>
                    <div class="menu__item hide"><a href="{{ route('mypage') }}"><i class="fas fa-user mr-1"></i><label>マイページ</label></a></div>

                    <div class="menu__item">使い方</div>
                  </div>

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

<script>
  $(function(){
    $('.menu-btn').on('click', function(){
      $('.menu').toggleClass('is-active');
      $('.menu-btn i').toggleClass('fa-bars fa-times');
    });
    $('.menu__item').on('click', function(){
      $('.menu').removeClass('is-active');
      $('.menu-btn i').removeClass('fa-times').addClass('fa-bars');
    });
  }());
</script>