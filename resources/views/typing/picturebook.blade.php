@extends('layouts.main')

@section('content')
<div class="picturebook-container">
  <div class="picturebook-container-title">
    <h2>{{$user->name}}の図鑑</h2>
  </div>
  <div class="picturebook-container-inner">
    <div class="picturebook-insect-container">
      @foreach($question as $k)
        <div class="insect-block">
          @php
            $check = false;
          @endphp
          @foreach($get as $k2 => $val)
            @if($val->question_id == $k->id)
              @php
                $check = true;
              @endphp
              <img src="{{ asset('/storage/insects/'. $k->on_image) }}">
            @endif
          @endforeach
          @if($check == false)
            <img src="{{ asset('/storage/insects/'. $k->off_image) }}">
          @endif
          <p>{{ $k->insect_name }}</p>
        </div>
      @endforeach
    </div>
  {{ $question->links() }}
  </div>
</div>
@endsection