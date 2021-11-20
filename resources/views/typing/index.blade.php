@extends('layouts.main')

@section('scripts')
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@section('content')
  <div class="container">
    <div class="typing-container">
      <div id="typing-container-inner">
        <!-- ゲーム画面 -->
        <img src="images/typing-image.png" class="typing-image">
        <div id="tree">
        </div>
        <div id="flower">
        </div>
        <div id="grass">
        </div>
        <button id="start">スタート</button>
      </div>
    </div>
  </div>
  <!-- 結果表示用モーダル -->
  <section class="result-modal">
    <div class="result">
      <div class="title">
        <h3>タイムアップ！</h3>
      </div>
      <div class="inner">
        @if(Auth::check())
          <h4>{{$user->name}}さんの結果は・・・</h4>
          <p id="result"></p>
        @else
          <h4>キミの結果は・・・</h4>
          <p id="result"></p>
        @endif
        <div id="result-img">
        </div>
        <div class="button">
          <button id="return">もう一回遊ぶ</button>
          <button id="add">図鑑に登録する</button>
        </div>
      </div>
    </div>
  </section>
  <script src="{{ asset('js/typing-game.js') }}"></script>
@endsection