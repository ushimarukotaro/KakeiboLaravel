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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">家計簿アプリ</a>
            <div class="my-navbar-control">
                {{-- @if (Auth::check()) --}}
                {{-- <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
                    ｜
                    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
                {{-- @else --}}
                <a class="my-navbar-item" href="#">ログイン</a>

                <a class="my-navbar-item" href="#">会員登録</a>
                {{-- @endif --}}
            </div>
        </nav>
    </header>

    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>
    <footer class="footer text-center">
        <span style="color:#b6b6b6;">copyright USHIMARU 2021</span>
    </footer>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
