<!DOCTYPE html>
<html>
  <head>
  <title>タイピングゲーム</title>
    <meta charset="UTF-8">
    <!-- stylesheet -->

    <!-- javascript -->
    @section('scripts')
    <!-- font -->
  </head>
  <body>
    <header>
      <div class="title-logo">
        <img src="" alt="タイトルロゴ">
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
    @section('content')
    <footer>
      <p>©︎ Tokie Inomata</p>
    </footer>
  </body>
</html>