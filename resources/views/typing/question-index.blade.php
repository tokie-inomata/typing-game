@extends('layouts.admin')

@section('content')
  <div class="question-contener">
    <div class="question-title">
      <h2>問題文一覧</h2>
    </div>
    <div class="question-index">
      <div class="question-index-inner">
        <table>
          <tr>
            <th>No</th>
            <th>日本語問題文</th>
            <th>ローマ字問題文</th>
          </tr>
          @foreach($questions as $k => $val)
            <tr>
              <td>{{ $val['id'] }}</td>
              <td>{{ $val['jp_question'] }}</td>
              <td>{{ $val['ro_question'] }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection