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
  @foreach ($messages as $message)
  <div>
    {{$message->created_at}}:{{$message->user->name}}:{{$message->text}}
  </div>
  @endforeach
  <form action="/chat/create" method="POST">
  @csrf
    <input type="text" name="text">
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <button type="submit" name="room_id" value="{{$room_id}}">送信</button>
  </form>
</body>
</html>
