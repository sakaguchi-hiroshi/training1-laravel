<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('/assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>名前</th>
        <th>メッセージ</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$item->name}}</td>
        @foreach ($rooms as $room)
        <td>{{$room}}</td>
        @endforeach
      </tr>
    </tbody>
  </table>
</body>
</html>
