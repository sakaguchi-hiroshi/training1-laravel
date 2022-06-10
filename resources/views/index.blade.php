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
    @foreach ($users as $user)
    <!-- <form action="/show" method="post"> -->
      <div>
        <a href="{{ url('/show', ['id'=>$user->id]) }}">
          {{$user->name}}
        </a>
      </div>
    <!-- </form> -->
    @endforeach
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <form class="create" action="/create" method="post">
      @csrf
      <input class="add-input" type="text" name="text">
      <input class="add-id" type="hidden" name="user_id" value="{{$authUser}}">
      <input type="submit" name="create" value="送信">
    </form>
    @foreach ($items as $item)
      <p>{{$item->text}}</p>
    @endforeach
  </section>
</body>
</html>