@extends('layouts.admin')

@section('content')
  <div class="main-container">
    <div class="title">
      <h2>問題文一覧</h2>
    </div>
    <div class="question-index">
      <div class="question-index-inner">
        <table>
          @foreach($questions as $k => $val)
            <tr>
              <a href=""><th rowspan="2"><img src="{{ asset('images/insects/Beetle.png') }}" width="100%"></th></a>
              <a href=""><td>{{ $val['jp_question'] }}</td></a>
            </tr>
            <tr>
              <a href=""><td>{{ $val['ro_question'] }}</td></a>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection