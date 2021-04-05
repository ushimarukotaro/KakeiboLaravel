<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿アプリ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
            <a class="my-navbar-brand" href="{{ route('books.index') }}">家計簿アプリ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="ワード検索" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-link-name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">マイページ</a>
                    <a class="dropdown-item" href="{{ route('books.create') }}">新規作成</a>
                    <a class="dropdown-item" href="{{ route('books.trash') }}">ゴミ箱を見る</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" id="logout" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
                @else
                    <a class="my-navbar-brand" href="/login">ログイン</a>
                    <a class="my-navbar-brand mr-4" href="/register">会員登録</a>
            @endif
              </ul>

            </div>
          </nav>
    </header>

    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>
    <footer class="footer d-flex align-items-center justify-content-center">
        <p class="footer-p" style="color:#b6b6b6;">copyright USHIMARU 2021</p>
    </footer>

</body>

</html>
