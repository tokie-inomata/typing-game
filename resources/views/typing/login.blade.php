@extends('layouts.main')

@section('content')
  <div class="auth-container">
    <div class="login-container">
      <div class="login-title">
        <h2>ログイン</h2>
      </div>
      <div class="login-form">
        <form action="{{ route('login.route') }}" method="post">
          @csrf
          <dt>メールアドレス</dt>
          <dd><input type="text" name="email"></dd>
          <dt>パスワード</dt>
          <dd><input type="password" name="password"></dd>
          <input type="submit" class="login-btn" name="login" value="ログイン">
        </form>
        <p>パスワードを忘れた方は<span><a href="">こちら</a></span></p>
      </div>
    </div>
    <div class="entry-container">
      <div class="entry-title">
        <h2>ユーザー登録</h2>
      </div>
      <div class="entry-form">
        <form action="{{ route('login.route') }}" method="post">
          @csrf
          <dt>なまえ</dt>
          <dd><input type="text" name="name"></dd>
          <dt>メールアドレス</dt>
          <dd><input type="text" name="email"></dd>
          <dt>パスワード</dt>
          <dd><input type="password" name="password"></dd>
          <dt>パスワード確認</dt>
          <dd><input type="password" name="password"></dd>
          <input type="hidden" name="admin_flag" value="0">
          <input type="submit" class="entry-btn" name="entry" value="登録">
        </form>
      </div>
    </div>
  </div>
@endsection