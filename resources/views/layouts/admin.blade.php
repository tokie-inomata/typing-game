<!DOCTYPE html>
<html>
  <head>
  <title>タイピングゲーム 管理画面</title>
    <meta charset="UTF-8">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <!-- javascript -->
    @yield('scripts')
    <!-- font -->
  </head>
  <body>
    <div id="wrapper">
      <header class="admin-header">
        <div class="admin-title-logo">
          <h1>ゲーム管理画面</h1>
        </div>
        <div class="admin-menu-list">
          <ul class="admin-menu-list-ul">
            <ol><a href="/">ゲーム画面へ戻る</a></ol>
            <ol><a href="">問題一覧</a></ol>
            <ol><a href="">昆虫一覧</a></ol>
            <ol><a href="">ユーザー一覧</a></ol>
            <ol><a href="/logout">ログアウト</a></ol>
          </ul>
        </div>
      </header>
      @yield('content')
      <footer class="admin-footer">
        <p class="admin-copyright">Copyright ©︎ 2021 Tokie Inomata</p>
      </footer>
    </div>
  </body>
</html>