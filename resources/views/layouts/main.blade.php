<!DOCTYPE html>
<html>
  <head>
  <title>タイピングゲーム</title>
    <meta charset="UTF-8">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <!-- javascript -->
    @yield('scripts')
    <!-- font -->
  </head>
  <body>
    <div id="wrapper">
      <header>
        <div class="title-logo">
          <h1><a href="/">タイピングゲーム</a></h1>
        </div>
        <div class="menu-list">
          <ul class="menu-list-ul">
            <ol><a href="/how-to-play">遊び方</a></ol>
            <ol><a href="/pictureBook">図鑑</a></ol>
            @if(Auth::check())
              @if(Auth::user()->admin_flag == 1)
                <ol><a href="/question">管理画面</a></ol>
              @endif
              <ol><a href="/logout">ログアウト</a></ol>
            @else
              <ol><a href="/login">ログイン</a></ol>
            @endif
          </ul>
        </div>
      </header>
      @yield('content')
      <footer>
        <p class="copyright">Copyright ©︎ 2021 Inomama</p>
      </footer>
    </div>
  </body>
</html>