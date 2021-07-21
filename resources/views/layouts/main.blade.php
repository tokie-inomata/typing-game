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
          <h1>タイピングゲーム</h1>
        </div>
        <div class="menu-list">
          <ul>
            <ol>遊び方</ol>
            <ol>図鑑</ol>
            @if(Auth::check())
              <ol>ログアウト</ol>
            @else
              <ol>ログイン</ol>
            @endif
          </ul>
        </div>
      </header>
      @yield('content')
      <footer>
        <p class="copyright">Copyright ©︎ 2021 Tokie Inomata</p>
      </footer>
    </div>
  </body>
</html>