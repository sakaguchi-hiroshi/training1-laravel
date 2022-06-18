<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('/assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
</head>
<body>
  <section class="section">
    
    <p>チャットルーム作成</p>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <form class="create" action="/create" method="post">
      @csrf
      部屋の名前:<input class="add-input" type="text" name="room_name">
      <input class="add-id" type="hidden" name="user_id" value="{{$authUser}}">
      <input type="submit" name="create" value="作成">
    </form>
    @foreach ($rooms as $room)
    <!-- <form action="/show" method="post"> -->
      <div>
        <!-- <a href="{{ route('show', ['id'=>$room->id])}}">{{$room->room_name}}</a> -->
        
        <a href="{{ url('/show', ['id'=>$room->id]) }}">
          {{$room->room_name}}
        </a>
      </div>
    <!-- </form> -->

    @endforeach
  </section>
</body>
</html>